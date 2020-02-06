 <?php 
    $query_select=mysqli_query($con, "SELECT * FROM quotes
                        ORDER BY ID");
    $quotes = array();
    while($quote = mysqli_fetch_array($query_select))
    $quotes[] = $quote;


?>



<!-- <label>Name: </label>
<input type="input" value="" name="card1Name" /> 
</br>  -->
<div class="quotes-container">
<table>
 <?php foreach ($quotes as $quote) : ?>
    <tr>
    <td><?php echo $quote['quoteText']; ?></td>
    <td><?php echo $quote['author']; ?></td>    
    <td><form action="deleteQuote.php" method="post"
              id="delete_quote_form">
        <input type="hidden" name="id"
               value="<?php echo $quote['ID']; ?>" />
        <input type="submit" value="Delete" />
    </form></td>
</tr>
<?php endforeach; ?>    
</table>  
</div>

<form action="addQuote.php" method="post" id="add_quote_form">
    <h4>Add a Quote</h4>
    <div class="left-70">
        <label>Quote Text:</label>
        <textarea id="quote-content" name="quoteText" maxlength="130"></textarea>
        <p id="quote-message" class="small"></p>
        <br />  
    </div>
    
    <div class="right-30">
        <label>Quote Author:</label>
        <input type="input" name="author" maxlength="30"/>
        <br />
        <input type="submit" value="Add Quote" />
  
    </div>
    
</form>

