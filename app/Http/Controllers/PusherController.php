<?
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Events\ChatMessage;
class PusherController extends Controller{
    public function index(){
        return view('index');
    }
    public function broadcast(Request $request){
        broadcast(new ChatMessage($request->get(key:'message')))->toOthers();

    }
}