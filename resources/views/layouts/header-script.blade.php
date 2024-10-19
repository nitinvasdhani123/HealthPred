    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width,initial-scale=1,minimum-scale=1">
    <meta http-equiv=X-UA-Compatible content="ie=edge">
    <title>Healthpred</title>
    <link rel="stylesheet preload" as=style href="{{ asset('public/css/preload.min.css') }}">
    <link rel="stylesheet preload" as=style href="{{ asset('public/css/icomoon.css') }}">
    <link rel="stylesheet preload" as=style href="{{ asset('public/css/libs.min.css') }}">
    <link rel="stylesheet preload" as=style href="{{ asset('public/css/contacts.min.css') }}">
    <link rel=stylesheet href="{{ asset('public/css/index.min.css') }}">
    <link rel=stylesheet href="{{ asset('public/css/floatbutton.min.css') }}">
    
    <style>
        .mdp-float{
            display:none;
        }
        .contacts_form-form_field {
            border-radius: 24px;
            border: 1px solid #c6c6c6;
            padding: 13px 20px;
            margin-bottom: 20px;
            color: #214842;
        }
        
        .card {
          display: none; 
          background-color: #fff;
          border-radius: 8px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          overflow: hidden;
          transition: transform 0.2s, box-shadow 0.2s;
          width: 350px;
          margin: 20px auto;
          padding: 20px;
          text-align: center;
        }
        
        .card:hover {
          transform: translateY(-10px);
          box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        
        .card-header {
          font-size: 1.5em;
          font-weight: bold;
          color: #333;
          margin-bottom: 10px;
        }
        
        .card-content {
          font-size: 1em;
          color: #555;
          margin-bottom: 20px;
        }
        
        .card-result {
          font-size: 1.2em;
          font-weight: bold;
          color: #007BFF;
          margin: 10px 0;
        }
        
        .card a {
          display: inline-block;
          padding: 10px 20px;
          background-color: #007BFF;
          color: #fff;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          transition: background-color 0.2s;
        }
        
        .card a:hover {
          background-color: #0056b3;
        }
        
        
        ul.ul-list {
            list-style-type: disc;
            margin-left: 20px;
            padding-left: 0;
        }
        
        ol.ol-list {
            list-style-type: auto;
            margin-left: 20px;
        } 
        
        .mdp-float{
            display: none;
        }
    
        ul {
            padding-left: 20px;
            list-style: none;
        }
        
        ul > li {
            position: relative;
            margin-bottom: 10px;
            padding-left: 25px; 
            font-size: 16px;
            color: #333;
        }
        
        ul > li::before {
            content: '•'; 
            position: absolute;
            left: 0;
            top: 0;
            color: #007bff; 
            font-size: 20px; 
            line-height: 1;
        }
        
        ul > li > ul {
            padding-left: 15px;
        }
        
        ul > li > ul > ol {
            list-style: decimal;
            padding-left: 15px;
        }
        
        ul > li:hover {
            color: #0056b3;
        }
    </style>