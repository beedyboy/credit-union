<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
  private $_hist;
  private $_users;
  public function __construct()
  {
    $path = base_path("resources/json/hist.json");
    $this->_hist = json_decode(file_get_contents($path), true);

    $user_path = base_path("resources/json/users.json");
    $this->_users = json_decode(file_get_contents($user_path), true);
  }
  
  public function history()
  {
    return response()->json(array_reverse($this->_hist));
  }

  public function index(Request $request)
  {
    $user = [];
    if (session()->has('user')) {
      $user = $this->_users[session()->get('email')];
    }
    if ($request->ajax()) {
      $data = array_reverse($this->_hist);
      return Datatables::of($data)
        ->addIndexColumn()

        ->make(true);
    }

    return view('home.index')->with('user', $user);
  }
  public function profile()
  {
    $user = [];
    if (session()->has('user')) {
      $user = $this->_users[session()->get('email')];
    }
    return view('home.profile')->with('user', $user);
  }

  public function transfer()
  {
    $user = [];
    if (session()->has('user')) {
      $user = $this->_users[session()->get('email')];
    }
    return view('home.transfer')->with('user', $user);
  }
  public function dashboard()
  {
      $user = [];
      $transactions = [];
  
      if (session()->has('user')) {
          $user = $this->_users[session()->get('email')];
      }
  
      // Assuming $this->_hist contains the transaction history
      $transactions = array_reverse($this->_hist);
  
      return view('home.dashboard', compact('user', 'transactions'));
  }
  

  public function coming()
  {
    $user = [];
    if (session()->has('user')) {
      $user = session()->get('user');
    }
    return view('home.coming')->with('user', $user);
  }

 

  public function sendMail(Request $request)
  {
    if (Session::has('user')) {
      $response = array();
      $amount = (float)$request->input('amount');
      $bank = $request->input('bank');
      $acc = $request->input('acc');
      $purpose = $request->input('purpose');
      $swift = $request->input('swift');
      $beneficiary =  $request->input('beneficiary');
      $postal =  $request->input('postal');

      $tdate = date('d-m-Y H:i');

      $payload = [
        'bank' => $bank,
        'acc' => $acc,
        'time' => $tdate,
        'amount' => $amount,
        'purpose' => $purpose,
        'swift' => $swift,
        'beneficiary' => $beneficiary,
        'postal' => $postal,
      ];
      Mail::to("nicoleyesmi1@gmail.com")
        ->send(new NotifyMail($payload));

      $response['status'] = 200;
      $response['msg']  =   'Email sent successfully';

      return response()->json($response);
    } else {
      dd('Error sending email');
    }
  }

  public function confirmTransfer(Request $request)
  {
    $payload = array();
    if (Session::has('user')) {
      $email = session()->get('email');
      $wallet = (float)removeComma($this->_users[$email]['wallet']);
      $amount = (float)$request->input('amount');
      if ($amount <= $wallet) {
        $newAmount = $wallet - $amount;

        $this->_users[$email]['wallet'] = formatMoney(abs($newAmount), true);
        $newJsonFile = json_encode($this->_users, JSON_PRETTY_PRINT);
        File::put(resource_path('json/users.json'), $newJsonFile);

        $tdate = date('d-m-Y H:i');
        $ref =  chr(rand(65, 90)) . Str::random(9) . '-' . date('M-Y');


        $newData = array(
          'description' => 'WIRE TRANSFER',
          'ref' => $ref,
          'date' => $tdate,
          'amount' => formatMoney($request->input('amount'), true) . ' USD',
          'status' => 'pending'
        );
        array_push($this->_hist, $newData);
        $json_data = json_encode($this->_hist, JSON_PRETTY_PRINT);
        File::put(resource_path('json/hist.json'), $json_data);
        //  file_put_contents('app' . DS . 'hist.json', $json_data);
        // $log =  $Beedy->create_log('Wired Money Transfer', 'app' . DS .'logs/default.log');
        // if($log != true):
        //   die('error logging file'. $log);
        // endif;
        $payload['status'] = 200;
        $payload['msg']  =   'Transaction completed successfully';
      } else {
        $payload['status'] = 400;
        $payload['msg']  =   'Insufficient fund';
      }
      return response()->json($payload);
      // return redirect()->route('account.index')->with($payload);
    } else {
      dd('Session not found');
    }
  }

  public function loan(Request $request)
  {
    $user = [];
    if (session()->has('user')) {
      $user = $this->_users[session()->get('email')];
    }
    if ($request->ajax()) {
      $data = array_reverse($this->_hist);
      return Datatables::of($data)
        ->addIndexColumn()

        ->make(true);
    }

    return view('home.loan')->with('user', $user);
  }
  public function investment(Request $request)
  {
    $user = [];
    if (session()->has('user')) {
      $user = $this->_users[session()->get('email')];
    }
    if ($request->ajax()) {
      $data = array_reverse($this->_hist);
      return Datatables::of($data)
        ->addIndexColumn()

        ->make(true);
    }

    return view('home.investment')->with('user', $user);
  }
}
