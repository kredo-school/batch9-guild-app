<?php

namespace App\Http\Controllers\Freelancer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Application;
use App\Models\ProjectComment;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ProjectController extends Controller
{
    public function index(Request $request){
        $query = Project::query();
        $query->where('status', 'open');

        if($request->filled('keyword')){
            $keywords = explode(' ', $request->keyword);
            $query->where(function($q) use ($keywords){
                foreach($keywords as $keyword){
                    $q->where(function ($subQ) use ($keyword){
                        $subQ->where('title', 'like', '%' . $keyword . '%')
                            ->orWhere('description', 'like', '%' . $keyword . '%');
                    });
                }
            });
        }

        if($request->filled('required_rank')){
            $query->where('required_rank', '=', $request->required_rank);
        }

        if($request->filled('skills')){
            $skills = $request->input('skills');
            $query->whereHas('skills', function($q) use ($skills){
                $q->whereIn('skills.id', $skills);
            });
        }

        if($request->filled('min_reward')){
            $query->where('reward_amount', '>=', $request->min_reward);
        }
        if($request->filled('max_reward')){
            $query->where('reward_amount', '<=', $request->max_reward);
        }

        if($request->sort == 'old'){
            $query->orderBy('created_at', 'asc');
        }else{
            $query->orderBy('created_at', 'desc');
        }

        $all_projects = $query->paginate(5);
        $all_skills = Skill::all();

        return view('freelancers.projects.index', compact('all_projects', 'all_skills'));
    }

    public function show($id){
        $project = Project::findOrFail($id);
        $all_comments = ProjectComment::where('project_id', $id)->get();

        $application = $project->application ?? null;

        return view('freelancers.projects.show', compact('project', 'all_comments', 'application'));
    }


    public function store(CommentRequest $request){
        ProjectComment::create([
            'content'    => $request->content,
            'user_id'    => Auth::user()->id,
            'project_id' => $request->id
        ]);

        return redirect()->route('freelancer.projects.show', $request->id);
    }

    public function favorite(Project $project){
        $user = Auth::user();

        if($user->favoriteProjects()->where('project_id', $project->id)->exists()){
            $user->favoriteProjects()->detach($project->id);
            $favorite = false;
        }else{
            $user->favoriteProjects()->attach($project->id);
            $favorite = true;
        }

        return response()->json(['favorite' => $favorite]);
    }

    // application status
    public function request($id){
        $project = Project::findOrFail($id);
        $project->status = 'ongoing';
        $project->save();

        Application::create([
            'freelancer_id' => Auth::user()->freelancer->id,
            'project_id'    => $id,
            'status'        => 'requested'
        ]);

        return redirect()->back();
    }

    public function cancelRequest($id){
        $application = Application::findOrFail($id);
        $project = $application->project;

        $project->status = 'open';
        $project->save();
        $application->delete();

        return redirect()->back();
    }

    public function start($id){
        $application = Application::findOrFail($id);
        $application->status = 'ongoing';
        $application->save();

        return redirect()->back();
    }

    public function rejectAcknowledge($id){
        $application = Application::findOrFail($id);
        $project = $application->project;

        $project->status = 'open';
        $project->save();
        $application->delete();

        return redirect()->back();
    }

    public function submit($id){
        $application = Application::findOrFail($id);
        $application->status = 'submitted';
        $application->save();

        return redirect()->back();
    }

    public function result($id){
        $application = Application::findOrFail($id);
        $project = $application->project;
        $admin = User::where('role_id', User::ADMIN_ROLE_ID)->first();

        $user = Auth::user()->freelancer;
        $user->total_earnings += $project->reward_amount;
        $user->save();

        Transaction::create([
            'payer_id'   => $admin->id,
            'payee_id'   => Auth::user()->id,
            'project_id' => $project->id,
            'type'       => 'freelancer_payment',
            'order_id' => null,
            'transaction_id' => null,
            'amount'     => $project->reward_amount,
            'fee' => null,
            'currency' => null,
            'status' => 'COMPLETED'
        ]);
        $application->delete();
        $project->status = 'completed';
        $project->save();

        DB::transaction(function() use ($user, $project){
            $new_rank_point = $user->rank_point;

            if($user->rank == $project->required_rank){
                $new_rank_point += 1;
            }elseif($user->rank < $project->required_rank){
                $new_rank_point += 2;
            }else{
                $new_rank_point += 0;
            }
            $user->save();

            if($new_rank_point >= 10 && $user->rank < 5){
                $user->rank += 1;
                $new_rank_point = 0;
            }

            $user->rank_point = $new_rank_point;
            $user->save();
        });

        $admin->admin->balance -= $project->reward_amount;
        $admin->admin->escrow_balance -= $project->reward_amount;
        $admin->admin->save();


        return redirect()->back();
    }
}
