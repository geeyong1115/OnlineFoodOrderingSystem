<?php
/**
 * @author YapYoonEn
 */
use App\Models\Order;

class QRExpired {
    
    public function expired($id) {
        $order = Order::where('id', $id)->value('status');
        if($order == 1) {
            //clear cart
            $o = session()->get('orderId');
            session()->forget($o);
            //clear orderid
            session()->forget('orderId');
            //clear tableno
            session()->forget('tableNo');
            ?><script>window.location = 'invalid';</script><?php
        }
    }
    
    public function invalid() {
        if(isset($_GET['tno'])) {
            return "valid";
        } else {
            ?><script>window.location = 'invalid';</script><?php
        }
    }
}
