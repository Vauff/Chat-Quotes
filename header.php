<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
        	@font-face
        	{
        		font-family: Unicorn;
        		src: url('fonts/unicorn.ttf');
        	}
        	
            body
            {
                padding-top: 20px;
            }
            
            html body
            {
                background-color: #98AFC7;
            }
            
            h1
            {
                text-align: center;
                font-size: 48px !important;
            }
            
            h3
            {
            	text-align: center;
            }
            
            .quote > h4
            {
            	font-size: 30px !important;
            }
            
            .quote > h5
            {
            	font-size: 24px !important;
            }
            
            .quote > h6
            {
            	font-size: 16px !important;
            }
            
            .cstm-form-control
            {
				width: 50%;
				height: 34px;
				padding: 6px 12px;
				font-size: 14px;
				line-height: 1.42857143;
				color: #555;
				background-color: #fff;
				background-image: none;
				border: 1px solid #ccc;
				border-radius: 4px;
				-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
				        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
				-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
				     -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
				        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
			}
			
			.centered
			{
				text-align: center;
			}
			
			a
			{
				text-decoration: none !important;
			}
        </style>
        <meta charset="UTF-8">
        <title>IRC Quotes</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
	            <h1><font face="Unicorn">IRC Quotes</font></h1>
	            <h3>By Vauff</h3>
	            <br>
            	<button class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add Quote</button>
            	<form action="search.php">
	            	<input class="cstm-form-control" name="quotesearch" type="search" placeholder="Search for a Quote">
	            	<button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-search"></span>  Search</button>
	            </form>
                <hr>