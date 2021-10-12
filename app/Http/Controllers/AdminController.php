<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Kratmeister;
use App\Overigeproduct;
use App\Beerbrand;
use App\Order;
use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{
    // admin control panel index
    public function index()
    {
        return view('admin.index');
    }

    //book index on  admin control panel
    public function adminBooks()
    {
        return view('admin.adminBooks', ['books' => Book::orderBy('created_at', 'DESC')->get()]);
    }

    //kratmeister index on admin control panel
    public function adminKratmeister()
    {
        return view('admin.adminKratmeister', ['kratmeisters' => Kratmeister::orderBy('created_at', 'DESC')->get()]);
    }

    //Other products index on admin control panel
    //currently not in use
    public function adminOverigeProducten()
    {
        return view('admin.adminOverigeProducten', ['overigeProducts' => Overigeproduct::orderBy('created_at', 'DESC')->get()]);
    }

    //Beer brands index on admin control panel
    public function adminBeerbrands()
    {
        return view('admin.adminBeerbrands', ['beerbrands' => Beerbrand::orderBy('created_at', 'DESC')->get()]);
    }
    //not needed anymore delete after testing
    public function adminOrders(){
   
        $orders = Order::orderBy('created_at', 'desc')->paginate(20);
        // <a class="nav-item nav-link" href="{{ route('filterOrders',["id"=>"all"]) }}">Orders</a>
        // return view(route('filterOrders',["id"=>"all"]));
        // return view('admin.adminOrders', ['orders' => $orders]);
        return view('admin.adminOrders', ['orders' => $orders,'buttonHighlight'=>'all']);


    }

    //Search and return the orders for mollie_id or order database id.
    public function adminSearchOrders(Request $request){
        $searchInput = $request->input('search');
        $orders = Order::where('mollie_id',$searchInput )->orWhere('id',$searchInput)->paginate(); 
      
        return view('admin.adminOrders', ['orders' => $orders,'buttonHighlight'=>'search']);

    }

    //Order filtering
    public function adminFilterOrders($id){
        switch ($id) {
            case 'to_send':
                $orders = Order::where('paymentStatus', 'is_paid')->orderBy('created_at', 'desc')->paginate(20);
                return view('admin.adminOrders', ['orders' => $orders,'buttonHighlight'=>'is_paid']);
                break;
    
            case 'shipped':
         
                $orders = Order::where('paymentStatus', 'shipped')->orderBy('created_at', 'desc')->paginate(20);
                return view('admin.adminOrders', ['orders' => $orders,'buttonHighlight'=>'shipped']);
                break;
    
            case 'other':
        
                $orders = Order::where('paymentStatus','!=','shipped')->orderBy('created_at', 'desc')->where('paymentStatus','!=','is_paid')->paginate(20);
                return view('admin.adminOrders', ['orders' => $orders,'buttonHighlight'=>'problem']);
                break;

                case 'all':
           
                    $orders = Order::orderBy('created_at', 'desc')->paginate(20);
                    return view('admin.adminOrders', ['orders' => $orders,'buttonHighlight'=>'all']);
                    break;
        }


    }

    //delete after testing
    // public function adminOrdersFilter(Request $request){
    //     switch ($request->input('action')) {
    //         case 'to_send':
    //             error_log("te verzende items");
    //             // Save model
    //             $orders = Order::where('paymentStatus', 'is_paid')->paginate(2);
    //             return view('admin.adminOrders', ['orders' => $orders]);

    //             break;
    
    //         case 'shipped':
    //             // Preview model
    //             error_log("previewing meuk");
    //             $orders = Order::where('paymentStatus', 'shipped')->paginate(2);
    //             return view('admin.adminOrders', ['orders' => $orders]);
    //             break;
    
    //         case 'other':
    //             // Redirect to advanced edit
    //             error_log("advanced edit meuk");
    //             $orders = Order::where('paymentStatus','!=','shipped')->where('paymentStatus','!=','is_paid')->paginate(2);
    //             return view('admin.adminOrders', ['orders' => $orders]);
    //             break;

    //             case 'all':
    //                 // Redirect to advanced edit
    //                 error_log("advanced edit meuk");
    //                 $orders = Order::paginate(2);
    //                 return view('admin.adminOrders', ['orders' => $orders]);
    //                 break;
    //     }
    // }
}
