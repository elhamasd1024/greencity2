<?php
include 'Resources/Php/ifLogedIn.php';
include 'Resources/Php/dashboard.php';
include 'header.php';
?>

<div class="flex justify-center p-8  overflow-auto h-5/6">

    <div>
            <a href="add-station.php" class="text-blue-500">Add New Station</a>
        <table class="table-auto border-separate border border-green-800">
            <thead>
            <tr>
                <th colspan="6">List of your Stations</th>
            </tr>
            <tr>
                <th>ID.</th>
                <th>City</th>
                <th>Area</th>
                <th>Address</th>
                <th>Lat/Lng</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=0;
            while ($station = mysqli_fetch_assoc($stations)){
                $i++;
                echo "
                <tr>
                    <td rowspan='2'>".$station['id']."</td>
                    <td class='text-center'>".$station['city']."</td>
                    <td class='text-center'>".$station['area']."</td>
                    <td class='text-center'>".$station['address']."</td>
                    <td rowspan='2'>Lat: ".$station['lat']."<br>Lng: ".$station['lng']."<br><br></td>
                </tr>
                <tr>
                <td class='text-center'>";
                if ($station['approved']){
                    echo '<span class="text-green-500">Approved by Admin</span>';
                }else{
                    echo '<span class="text-yellow-500">Waiting for Approve</span>';
                }
                echo"
                </td>
                    <td colspan='2' class='text-center'> <a href='deleteStation.php?station=".$station['id']."' class='text-red-500'>Delete</a></td>
                </tr>
                ";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include 'footer.php';
?>
