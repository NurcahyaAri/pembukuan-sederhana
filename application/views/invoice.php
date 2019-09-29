<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .invoice-title h2, .invoice-title h3 {
            display: inline-block;
        }

        .table > tbody > tr > .no-line {
            border-top: none;
        }

        .table > thead > tr > .no-line {
            border-bottom: none;
        }

        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
        }
    </style>
</head>
<body>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container" onclick="callPrint()">
        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-title">
                    <h2>Invoice</h2>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                        <strong>
                            <h1>
                                <img src="<?= base_url() ?>/assets/images/logo.png" width="64" height="64"></img>
                                Anna Salon
                            </h1>
                        </strong>
                        <br>
                        <p>Jl. Ngasem 35B Yogyakarta</p>
                        <p>087 839 399 294</p>
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                        <strong>Pemesan :</strong><br>
                            <?php echo $barang[0]->nama?>
                            <?php echo $barang[0]->nomer_handphone?>
                        </address>
                        <br>
                        <strong>Status :</strong><br>
                        <?php echo $barang[0]->status?>
                    </div>
                    <div class="col-xs-12">
                        <!-- tambah teks disini -->
                        RIAS PENGANTIN NUSANTARA,
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>Nama Barang</strong></td>
                                        <td class="text-center"><strong>Harga</strong></td>
                                        <td class="text-center"><strong>Banyak</strong></td>
                                        <td class="text-right"><strong>Jumlah</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($barang as $b){
                                        echo "
                                        <tr>
                                            <td>$b->nama_barang ($b->kelengkapan)</td>
                                            <td class='text-center'>$b->harga_sewa</td>
                                            <td class='text-center'>$b->jumlah_barang</td>
                                            <td class='text-right'>" . $b->harga_sewa*$b->jumlah_barang . "</td>
                                        </tr>
                                        ";

                                    } ?>
                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"><strong>Terbayar</strong></td>
                                        <td class="no-line text-right"><?php echo $barang[0]->terbayar?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li>PAKAIAN YANG TELAH DISEWA, APABILA BATAL. DP TIDAK DAPAT KEMBALI</li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-5">
                <h4>Pemesan</h4>
                <br/>
                <br/>
                <p>........................</p>
            </div>
            <div class="col-xs-5 text-right">
                <h4>Hormat Kami</h4>
                <br/>
                <br/>
                <p>........................</p>
            </div>
            <div class="col-xs-1"></div>
        </div>
    </div>
</body>
</html>

<script>
    window.print();

    function callPrint(){
        window.print();
    }
</script>