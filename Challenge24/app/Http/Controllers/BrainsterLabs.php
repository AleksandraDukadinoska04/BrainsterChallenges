<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Hash;
use App\Mail\CompanyContactMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Projects;
use App\Models\Admins;
use App\Models\Company;



class BrainsterLabs extends Controller
{
    public function showHome()
    {
        $allProjects = $this->getAllProjects();

        return view('BrainsterLabs.home', ['allProjects' => $allProjects]);
    }
    public function showLogin()
    {
        if (session()->has('logedIn') && session()->has('email')) {
            return redirect()->route('home');
        }
        return view('BrainsterLabs.login');
    }
    public function showAddProject()
    {
        if (!session()->has('logedIn') && !session()->has('email')) {
            return redirect()->route('home');
        }
        return view('BrainsterLabs.addProject');
    }
    public function showChangeProject()
    {
        if (!session()->has('logedIn') && !session()->has('email')) {
            return redirect()->route('home');
        }
        $allProjects = $this->getAllProjects();
        return view('BrainsterLabs.changeProject', ['allProjects' => $allProjects]);
    }

    private function getAllProjects()
    {
        return Projects::all();
    }

    public function storeCompany(CompanyRequest $request)
    {
        if (!$request->isMethod('post')) {
            return redirect()->route('home');
        }

        $data = $request->except('_token');

        try {
            $company = Company::create($data);
        } catch (\Exception $exception) {
            throw $exception;
        }

        $details = $request->except('_token', 'created_at', 'updated_at');
        $response = Mail::to($data['email'])->send(new CompanyContactMail($details));
        // dd($response);

        return response()->json(['success' => 'Ви Благодариме што не исконтактиравте!']);
    }

    public function loginCheck(LoginRequest $request)
    {
        if (!$request->isMethod('post')) {
            return redirect()->route('login');
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $admin = Admins::where('email', $email)->first();

        if (!$admin) {
            return redirect()->back()->withErrors(['email' => 'Админ со овој е-мајл не е пронајден!']);
        }

        if (Hash::check($password, $admin->password)) {
            session(['logedIn' => true]);
            session(['email' => $admin->email]);

            return redirect()->route('changeProject');
        } else {
            return redirect()->back()->withErrors(['password' => 'Неточен пасворд!']);
        }
    }
    public function logout()
    {
        if (!session()->has('logedIn') && !session()->has('email')) {
            return redirect()->route('login');
        }

        session()->flush();

        return redirect()->route('login');
    }

    public function storeProject(ProjectRequest $request)
    {
        if (!$request->isMethod('post')) {
            return redirect()->route('addProject');
        }

        $data = $request->except('_token');

        try {
            $project = Projects::create($data);
        } catch (\Exception $exception) {
            throw $exception;
        }

        return redirect()->back()->with('success', 'Проектот е успешно додаден!');
    }

    public function updateProject(ProjectRequest $request, $id)
    {
        if (!$request->isMethod('patch')) {
            return redirect()->route('changeProject');
        }

        $data = $request->except('_token', 'created_at');

        $project = Projects::find($id);

        if ($project) {
            $project->update($data);
            return redirect()->back()->with('success', "Проектот со ID $id е успешно изменет!");
        } else {
            return redirect()->back()->with('error', "Проект со ID $id не постои!");
        }
    }

    public function deleteProject(Request $request, $id)
    {
        if (!$request->isMethod('delete')) {
            return redirect()->route('changeProject');
        }

        $project = Projects::find($id);

        if ($project) {
            $project->delete();
            return redirect()->back()->with('success', "Проектот со ID $id е успешно избришан!");
        } else {
            return redirect()->back()->with('error', "Проект со ID $id не постои!");
        }
    }
}
