
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Budget Buddy</title>
    <link rel="stylesheet" type="text/css"
          href="add in css file">
</head>
<style>
    /* Style the list */
ul.breadcrumb {
  padding: 10px 16px;
  list-style: none;
  background-color: #eee;
}

/* Display list items side by side */
ul.breadcrumb li {
  display: inline;
  font-size: 18px;
}

/* Add a slash symbol (/) before/behind each list item */
ul.breadcrumb li+li:before {
  padding: 8px;
  color: black;
  content: "/\00a0";
}

/* Add a color to all links inside the list */
ul.breadcrumb li a {
  color: #0275d8;
  text-decoration: none;
}

/* Add a color on mouse-over */
ul.breadcrumb li a:hover {
  color: #01447e;
  text-decoration: underline;
}
</style>
    
<!-- the body section -->
<body>
<header><h1>Budge Buddy</h1></header>
<ul class="breadcrumb">
  <li><a href="/ex_solutions/ch14_ex1_sol/">Home</a></li>
  <li><a href="/ex_solutions/ch14_ex1_sol/product_Manager">Product Manager</a></li>
  <li><a href="/ex_solutions/ch14_ex1_sol/product_catalog/">Product Catalog</a></li>
</ul>
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

