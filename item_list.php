<!DOCTYPE html>
<html>
<head>
    <title>Shopping List Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <header>
        <h1>Shopping List Manager</h1>
    </header>
    <main>
        <!-- error list -->
        <?php if (count($errors) > 0) : ?>
        <h2>Errors</h2>
        <ul>
            <?php foreach($errors as $error) : ?>
            <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <!-- item list -->
        <h2>Items</h2>
		
        <?php if (count($item_list) == 0) : ?>
            <p>There are no items in the list.</p>
		
		
	<!--populates the list. declares $id as simply the key to the value in the list-->	
        <?php else: ?>
			<ul>
            <?php foreach( $item_list as $id => $item) : ?>
                <li><?php echo $id + 1 . '. ' . htmlspecialchars($item); ?></li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <br>
		



        <!-- add form -->
        <h2>Add item</h2>
		
        <form action="." method="post" >
		
			<!--populate itemlist array-->
            <?php foreach( $item_list as $item ) : ?>
              <input type="hidden" name="itemlist[]" value="<?php echo htmlspecialchars($item); ?>">
            <?php endforeach; ?>
			
			<!--inputs-->
            <input type="hidden" name="action" value="add">
            <label>item:</label>
            <input type="text" name="item"><br>
            <label>&nbsp;</label>
            <input type="submit" value="Add item"><br>
        </form>
        <br>





        <!--delete form-->
        <?php if (count($item_list) > 0) : ?>
        <h2>Delete item</h2>
		
        <form action="." method="post" >
		
		<!--populate itemlist array-->
        
			<?php foreach( $item_list as $item ) : ?>
              <input type="hidden" name="itemlist[]" value="<?php echo htmlspecialchars($item); ?>">
            <?php endforeach; ?>
			
            <input type="hidden" name="action" value="delete">
            <label>item:</label>
			
			<!--select input-->
            <select name="itemid">
                <?php foreach( $item_list as $id => $item ) : ?>
                    <option value="<?php echo $id; ?>">
                        <?php echo htmlspecialchars($item); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            <label>&nbsp;</label>
            <input type="submit" value="Delete item">
			
		<!--The sort form-->
		</form>
		<form action="." method="post">
            <!--populate itemlist... again. maybe we should have made a function-->
			<?php foreach( $item_list as $item ) : ?>
				<input type="hidden" name="itemlist[]" value="<?php echo htmlspecialchars($item); ?>">
            <?php endforeach; ?>
			<!--pass inputs-->
			<input type="hidden" name="action" value="sort">
			<input type="submit" value="sort">
		</form>
		
		<!--the modify form-->
		<h2>Modify item<h2>
		
		<form action="." method="post">
			<!--populate itemlist-->
			<?php foreach( $item_list as $item ) : ?>
              <input type="hidden" name="itemlist[]" value="<?php echo htmlspecialchars($item); ?>">
            <?php endforeach; ?>
			
			<!--select input-->
            <select name="select">
                <?php foreach( $item_list as $id => $item ) : ?>
                    <option value="<?php echo $id; ?>">
                        <?php echo htmlspecialchars($item); ?>
                    </option>
                <?php endforeach; ?>
			<br>
			<!--pass inputs-->
			<input type="text" name="txtmod">
			<input type="hidden" name="action" value="modify">
			<input type="submit" value="modify">
		
		</form>
		<?php endif ?>
		<br>
		<br>	
	</main>
</body>
</html>