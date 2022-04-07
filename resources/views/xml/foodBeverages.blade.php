<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($foodBeverages as $foodBeverage)
        <foodBeverages>
            <no>{{ $foodBeverage->id }}</no>
            <name>{{ $foodBeverage->name }}</name>
            <desc>{{ $foodBeverage->desc }}</desc>
            <price>{{ $foodBeverage->price }}</price>
            <instock_qty>{{ $foodBeverage->instock_qty }}</instock_qty>
            <status>{{ $foodBeverage->status }}</status>
            <created_at>{{ $foodBeverage->created_at }}</created_at>
        </foodBeverages>
    @endforeach
</urlset>