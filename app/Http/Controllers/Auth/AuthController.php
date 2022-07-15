<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Session;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Exception;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function viewPasswordReset()
    {
        return view('auth.passwordreset');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function passwordReset(Request $request)
    {
        $this->validate($request, [
            'password'  =>  'required|min:6|confirmed',
        ]);

        $username = $request->session()->get('username');

        $updatePassword = User::where('VIPUserName', $username)->first();

        if(!empty($updatePassword))
        {
            $updatePassword->password = Hash::make($request->password);
            $updatePassword->last_password_change = Carbon::now();
            $updatePassword->save();

            $request->session()->forget('username');

            return redirect()->route('login')->with([
                'status' => 'success',
                'message' => 'Successfully updated password'
            ]);
        }

        return redirect()->route('login')->with([
            'status' => 'danger',
            'message' => 'Failed to update password'
        ]);
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'auth_input' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('auth_input', 'password'); 

        $token = $this->performLogins($credentials, ['username', 'email', 'phone']);

        if ($token) {

            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }

        Auth::logout();
        return redirect("login")->withSuccess('Opps! You have entered invalid credentials');
    }


    /**
     * @param $data
     * @param $cases
     * @return bool
     * @throws Exception
     */
    public function performLogins($data, $cases)
    {
        $auth_input = $data['auth_input'];

        unset($data['auth_input']);

        foreach ($cases as $case) {
            try {
                $data[$case] = $auth_input;

                $token = auth()->attempt($data);

                if (!$token) {
                    unset($data[$case]);

                    continue;
                } else {
                    return $token;
                }
            } catch (\Exception $e) {
                throw new Exception("Validation error");
            }

        }
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }


    public function updatePassword(Request $request)
    {
        
        $checkPassword = User::where('username', $request->username)->orWhere('email', $request->email)->first();

    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        // $allEmployees = count(User::all());

        // $allProjects = count(Project::all());

        // $projects = Project::all();
        $allEmployees = count(User::all());

        $allProjects = [];

        $projects = [];

        $employees = User::all()->take(5);

        $getAllAbsentUsers = [];
        
        if(Auth::check()){
            return view('auth.dashboard', compact('allEmployees', 'allProjects', 'projects', 'employees', 'getAllAbsentUsers'));
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}