<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav">
            <li><?php  echo CHtml::link('Post house', array('house/create')); ?></li>
            <li><a href="#">My House</a></li>
        </ul>
    </div>
</div>

<div class="span12">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($houses as $house): ?>
            <tr>
                <td><?php echo CHtml::link($house->title, array('house/view', 'id'=>$house->id)) ;?></td>
                <td><?php echo "{$house->address_1}  {$house->address_2}" ;?></td>
                <td><?php echo $house->city ; ?></td>
                <td><?php echo $house->state ; ?></td>
            </tr>


        <?php endforeach; ?>
        </tbody>
    </table>
</div>