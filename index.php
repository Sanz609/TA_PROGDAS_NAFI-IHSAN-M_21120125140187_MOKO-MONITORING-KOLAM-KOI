<?php
include "klas.php";
$ta = new ta();
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta http-equiv="refresh" content="1">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MOKO</title>
  <style>
    :root {
      --bg: #f5f6fa;
      --white: #ffffff;
      --text: #2f3542;
      --sidebar: #1f2937;
      --sidebar-text: #e5e7eb;
      --border: #e5e7eb;
      --shadow: 0 1px 2px rgba(0, 0, 0, 0.06), 0 2px 6px rgba(0, 0, 0, 0.06);
      --radius: 10px;
    }

    /* Reset dasar */
    * {
      box-sizing: border-box
    }

    html,
    body {
      height: 100%;
      margin: 0;
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
      color: var(--text);
      background: var(--bg);
    }

    /* Layout utama */
    .app {
      display: grid;
      grid-template-columns: 260px 1fr;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      background: var(--sidebar);
      color: var(--sidebar-text);
      padding: 22px 18px;
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .brand {
      font-weight: 700;
      font-size: 18px;
      letter-spacing: 0.2px;
    }

    .nav {
      display: flex;
      flex-direction: column;
      gap: 8px;
      margin-top: 6px;
    }

    .nav a {
      color: var(--sidebar-text);
      text-decoration: none;
      padding: 10px 12px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: background 0.2s ease;
    }

    .nav a:hover {
      background: rgba(255, 255, 255, 0.08)
    }

    .nav a.active {
      background: rgba(255, 255, 255, 0.14)
    }

    .sidebar-footer {
      margin-top: auto;
      font-size: 12px;
      color: #cbd5e1;
      opacity: 0.9;
    }

    /* Header/topbar */
    .topbar {
      background: var(--white);
      box-shadow: var(--shadow);
      padding: 16px 20px;
      position: sticky;
      top: 0;
      z-index: 5;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .topbar h1 {
      font-size: 18px;
      margin: 0;
    }

    .user {
      font-size: 14px;
      color: var(--muted);
    }

    /* Konten */
    .content {
      padding: 22px;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    /* Grid kartu */
    .cards {
      display: grid;
      grid-template-columns: repeat(4, minmax(180px, 1fr));
      gap: 16px;
    }

    .card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 16px;
      display: flex;
      flex-direction: column;
      gap: 8px;
      min-height: 110px;
    }

    .card-title {
      font-weight: 600;
      font-size: 14px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .badge {
      height: 10px;
      width: 10px;
      border-radius: 50%;
      display: inline-block;
    }

    .card .actions {
      margin-top: auto;
    }

    .btn {
      display: inline-block;
      padding: 8px 12px;
      border-radius: 8px;
      border: 1px solid var(--border);
      background: #f8fafc;
      color: var(--text);
      font-size: 13px;
      text-decoration: none;
      transition: background 0.2s ease;
    }

    .btn:hover {
      background: #eef2f7
    }

    /* Section container */
    .section {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 16px;
    }

    .section h2 {
      font-size: 16px;
      margin: 0 0 12px 0;
    }

    .section p {
      margin: 0 0 10px 0;
      color: var(--muted);
      font-size: 13px;
    }

    /* Tabel batas ambang */
    .table-wrap {
      overflow: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }

    thead th {
      text-align: left;
      background: #f8fafc;
      border-bottom: 1px solid var(--border);
      padding: 10px 12px;
      font-weight: 600;
      color: #374151;
    }

    tbody td {
      border-bottom: 1px solid var(--border);
      padding: 10px 12px;
      color: #111827;
    }

    tbody tr:hover {
      background: #f9fbff;
    }

  </style>
</head>

<body>
  <div class="app">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="brand">MOKO</div>
      <nav class="nav">
        <a class="active" href="#">Dashboard</a>
      </nav>
    </aside>

    <!-- Main -->
    <main>
      <header class="topbar">
        <h1>MOKO | Monitoring Parameter Kolam Koi</h1>
        <div class="user">Welcome, User</div>
      </header>

      <div class="content">
        <?php

        date_default_timezone_set("Asia/Jakarta");
        $jam = date('H:i:s');
        $detik = date('s');
        $detik2 = substr($detik, 1);
        echo date("d M Y | H:i:s");

        ?>
        <!-- Section tanpa grafik -->
        <section class="section">
          <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:12px">
           
            <?php
            for ($i = 0; $i < 4; $i++) {
              if ($i == 0) {
                $titel = "Nilai pH";
                $nilai = $ta->pH();
                $par = "pH";
              } elseif ($i == 1) {
                $titel = "Nilai TDS (ppm)";
                $nilai = $ta->TDS();
                $par = "tds";
              } elseif ($i == 2) {
                $titel = "Ammonia (mg/L)";
                $nilai = $ta->nh3();
                $par = "nh3";
              } else {
                $titel = "Suhu (&deg;C)";
                $nilai = $ta->suhu();
                $par = "suhu";
              }
            ?>
              <div class="card">
                <div class="card-title"><?php echo $titel ?></div>
                <div style="font-size:22px;font-weight:700"><?php echo $nilai[$detik2] ?></div>
                <p style="color:var(--muted);margin-top:4px"><?php echo $ta->batas_ambang($par, $nilai[$detik2]); ?></p>
              </div>
            <?php
            }
            ?>

          </div>
        </section>

        <!-- Data Table Example -->
        <section class="section">
          <h2>Nilai Batas Ambang</h2>
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>Parameter</th>
                  <th>Nilai</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>pH</td>
                  <td><?php echo "< 7"; ?></td>
                  <td>pH asam</td>
                </tr>
                <tr>
                  <td>pH</td>
                  <td><?php echo "> 8"; ?></td>
                  <td>pH terlalu basa</td>
                </tr>
                <tr>
                  <td>TDS</td>
                  <td><?php echo "< 250"; ?></td>
                  <td>kadar terjaga</td>
                </tr>
                <tr>
                  <td>TDS</td>
                  <td><?php echo "> 300"; ?></td>
                  <td>kadar berat</td>
                </tr>
                 <tr>
                  <td>Amonia</td>
                  <td><?php echo "< 0.02"; ?></td>
                  <td>konsentrasi aman</td>
                </tr>
                 <tr>
                  <td>Amonia</td>
                  <td><?php echo "> 0.05"; ?></td>
                  <td>konsentrasi berbahaya</td>
                </tr>
                 <tr>
                  <td>Suhu</td>
                  <td><?php echo "24°C – 28°C"; ?></td>
                  <td>suhu ideal</td>
                </tr>
                 <tr>
                  <td>Suhu</td>
                  <td><?php echo "< 20°C / > 30°C"; ?></td>
                  <td>suhu mengkhawatirkan</td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>

      </div>
    </main>
  </div>
</body>

</html>