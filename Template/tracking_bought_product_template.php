
<?php 
    $accountId = $_GET["accountID"];
?>

<div class="container">

    <?php
    if ($bill->hienThiDonHangV2($accountId,"3") != null) :
        
    ?>
        <form action="" method="post">
            <h4 style="text-align: center;" class="py-5">Đơn hàng đã thanh toán</h4>
            <table align="center" width="100%" border="1 solid black" class="mb-5" style="text-align: center;">

                <thead>
                    <tr style="height: 100px; background-color: #203864; color: white;" class="font-baloo font-size-16">
                        <th>Mã Đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th colspan="2"></th>

                    </tr>
                    <?php
                    
                    $chiTietDonHang = $bill->hienThiDonHangV2($accountId,"3");
                    foreach ($chiTietDonHang as $item) :
                        
                    ?>
                        <tr style="height: 50px;">

                            <td><?php echo $item['MaDonHang'] ?></td>
                            <?php

                            ?>
                            <td>
                                <?php echo $item['NgayDat'];?>
                            </td>
                            <td>
                                <?php
                                echo number_format($item['TongTien']);;
                                ?>
                            </td>

                            <td>
                                <a href="xemChiTietDonHang.php?MaDonHang=<?php echo $item['MaDonHang']; ?>" >Xem chi tiết</a>
                            </td>
                            
                            


                        </tr>
                    <?php
                    endforeach;
                    ?>
                </thead>

            </table>
        </form>
    <?php
    endif;
    ?>
    

</div>