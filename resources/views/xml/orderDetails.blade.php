<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($order_details as $order_detail)
        <orders>
            <orderID>{{ $order_detail->id }}</orderID>
            <total_price>{{ $order_detail->total_price }}</total_price>
            <table_no>{{ $order_detail->table_no }}</table_no>
            <status>{{ $order_detail->status }}</status>
            <created_at>{{ $order_detail->created_at }}</created_at>

            <order_details>
                <foodID>{{ $order_detail->food_id }}</foodID>
                <name>{{ $order_detail->name }}</name>
                <quantity>{{ $order_detail->quantity }}</quantity>
                <price>{{ $order_detail->price }}</price>
            </order_details>
        </orders>
    @endforeach
</urlset>