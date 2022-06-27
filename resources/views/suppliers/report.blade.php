<table>
    <thead>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($suppliers as $value) {
            ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $value->suppname ?></td>
                <td><?= $value->suppmobile ?></td>
                <td><?= $value->suppemail ?></td>
                <td><?= $value->suppaddress ?></td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </tbody>
</table>