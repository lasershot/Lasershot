<?php
session_start();
include('mqtt_test.php');
include('function.php');
 ?>
<?php
$conn = conn();
$sql = "SELECT * FROM score_table";
if($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
     ?>
        <box>
            <inner class="bg-black shadow">
                    <sp class="m"></sp>
                    <h5 class="cont-pd cl-white t-center">
                        <?php echo $row['owner_id']; ?>
                    </h5>
                <p class="padding cl-white">
                    <?php echo $row['time_stamp']; ?>
                </p>
                <p class="padding cl-white">
                    <?php echo $row['score']; ?>
                </p>
                <sp class="l"></sp><sp class="vl"></sp>
            </inner>
        </box>
    <?php
    }
}
?>