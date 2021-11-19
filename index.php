<?php
//get itemlist array from POST
$item_list = filter_input(INPUT_POST, 'itemlist', FILTER_DEFAULT,                  
                          FILTER_REQUIRE_ARRAY);
if ($item_list === NULL) {
    $item_list = array();
}


//get action variable from POST
$action = filter_input(INPUT_POST, 'action');

//initialize error messages array
$errors = array();

//case switch based on which button the user has pressed
switch( $action ) {
    
	//adding new item to list
	case 'add':
        $new_item = filter_input(INPUT_POST, 'item');
        if (empty($new_item)) {
            $errors[] = 'The new item cannot be blank.';
        } else {
            $item_list[] = $new_item;
        }
        break;
		
	//deleting item from list	
    case 'delete':
        $item_index = filter_input(INPUT_POST, 'itemid', FILTER_VALIDATE_INT);
        if ($item_index === NULL || $item_index === FALSE) {
            $errors[] = 'The item cannot be deleted.';
        } else {
            unset($item_list[$item_index]);
            $item_list = array_values($item_list);
        }
        break;
		
	//sorting the list
	case 'sort':
		sort($item_list);
		break;
		
	//modify entry on list
	case 'modify' :
		$txtmod = filter_input(INPUT_POST, 'txtmod');
		$select = filter_input(INPUT_POST, 'select', FILTER_VALIDATE_INT);
		if(empty($txtmod) || $select === NULL){
			$errors[] = 'invalid modification entry.';
		} else {
			$item_list[$select] = $txtmod;
		}
		break;
}
include('item_list.php');
?>