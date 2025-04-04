<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.cdnfonts.com/css/gilroy-bold" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('web/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/plp.css')}}" />
    <link rel="stylesheet" href="{{asset('web/css/cart.css')}}" />
    
    @stack('styles') 
    @stack('login')
    @stack('cart')
    @stack('profile')
</head>