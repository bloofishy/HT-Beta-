<html>
<head>
	<title>Hero Toolshed</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>

<body>
	<div class="container">
	<form action="item-insert.php" method="post">
	<h1>Create a New Item</h1>
	<label for="item_name">Name</label>
	<input type="text" name="item_name" placeholder="What's the name?" required>
	<label for="item_price">Price</label>
	<input type="number" step="0.01" min="0" name="item_price" placeholder="What's the unit price?" required>
	<label for="item_description">Description</label>
	<input type="text" name="item_description" placeholder="What's it about?" required>
	<label for="item_amt">Inventory</label>
	<input type="number" min="0" name="item_amt" placeholder="What's the stock in the inventory?" required>
	<input type="submit" value="Submit">
	</form>
	</div>
</body>
</html>
<style>
/* CSS */
h1 {text-align:center; color: white;}
body {text-align: left;}
label {font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; color: white;}
input[type=text], input[type=number] {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    width: 100%; /* Full width */
    padding: 9px; /* Some padding */  
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}
input[type=submit] {background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer;}
input[type=submit]:hover {background-color: #45a049;}
.container {border-radius: 5px; background-color: rgba(0, 0, 0, 0.3); text-shadow:3px 3px 3px #000000; padding: 20px;}
</style>