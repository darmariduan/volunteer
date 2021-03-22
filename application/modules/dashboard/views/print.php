<html>

<head>
    <title>Print Member Data</title>
</head>

<body>

    <center>
        <h2>Member Report</h2>
    </center>
    <table border="1" style="width: 100%">
        <tr>
            <th width="1%">No</th>
            <th>Nama Member</th>
            <th>Alamat</th>
            <th>Agama</th>
            <th>Tempat Dan Tanggal Lahir</th>
            <th>Organisasi</th>
            <th>Email</th>
            <th>Nomor Hp</th>
            <th>Program</th>
            <th>Username</th>
            <th>Role</th>
            <?php
            $no = 1;
            foreach ($user as $user) {
                $id         = $user->id;
                $nama       = $user->nama_admin;
                $alamat     = $user->alamat;
                $agama      = $user->agama;
                $tl         = $user->tempat;
                $organisasi = $user->organisasi;
                $email      = $user->email;
                $nohp       = $user->nohp;
                $program    = $user->program;
                $username   = $user->username;
                $level      = $user->level;
            ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $nama; ?></td>
            <td><?= $alamat; ?></td>
            <td><?= $agama; ?></td>
            <td><?= $tl; ?></td>
            <td><?= $organisasi; ?></td>
            <td><?= $email; ?></td>
            <td><?= $nohp; ?></td>
            <td><?= $program; ?></td>
            <td><?= $username; ?></td>
            <td><?= $level; ?></td>
        </tr>
    <?php
                $no++;
            };
    ?>
    </table>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <p align="right"><b>Ketua    </b>
    <br>
    <br>
    <br>
    <br>
    <br>
     Safitri, A.Md. Kom </right>

    <script>
        window.print();
    </script>
</body>

</html>