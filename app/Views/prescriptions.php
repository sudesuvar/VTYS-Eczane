<?php include ("header.php"); ?>
    <div class="table">
        <table class="table  table-hover" style="background:#f2f2f2;">
            <thead>
                <tr>
                    <th scope="col">Reçete ID</th>
                    <th scope="col">Hasta ID</th>
                    <th scope="col">Hasta Adı</th>
                    <th scope="col">Hasta Soyadı</th>
                    <th scope="col">Reçete Görüntüle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>2</td>
                    <td>zeynep</td>
                    <td>Ayar</td>
                    <td><button class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="color: #808080; background:#ffa500; font-weight: bold;">GÖRÜNTÜLE</button></td>
                </tr>
            </tbody>
        </table>
    </div> 
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">REÇETE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Verilme Tarihi</th>
                                <th scope="col">Kullanım Süresi</th>
                                <th scope="col">Reçete Rengi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>12.12.2024</td>
                                <td>15 gün</td>
                                <td>Kırmızı</td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-sm" style="color: #808080; background:#ffa500; font-weight: bold; float: right;">Ne yapacak ?</button>
                </div>
            </div>
        </div>
    </div> 
</body> 
</html>