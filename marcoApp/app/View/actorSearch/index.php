<?php include VIEWS . 'actorSearch/_layouts/main.header.php';?>

<div class="controls">
    <button type="button" class="control" data-sort="age:desc name:asc">Desc</button>
    <button type="button" class="control" data-sort="age:asc name:asc">Asc</button>
    
    <button type="button" class="control" data-filter="all">All</button>
    <button type="button" class="control" data-filter=".male">Male</button>
    <button type="button" class="control" data-filter=".female">Female</button>
</div>

<div class="container">
    <?php
    $persons = array(
	    array('name' => 'marco', 'gender' => 'male','age' => '5'),
	    array('name' => 'cool man', 'gender' => 'male','age' => '20'),
	    array('name' => 'test', 'gender' => 'female','age' => '42'),
	    array('name' => 'meh', 'gender' => 'male','age' => '10'),
	    array('name' => 'cool female', 'gender' => 'female','age' => '105'),
	    array('name' => 'this is', 'gender' => 'female','age' => '60'),
    );

    foreach($persons as $person){
	    echo '<div class="mix ' . $person['gender'] . '" data-age="' . $person['age'] . '" data-name="' . $person['name'] . '"><h4>' . $person['name'] . '</h4></div>';
    }    
    ?>
   

    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
</div>

<?php include VIEWS . 'actorSearch/_layouts/main.footer.php';?>