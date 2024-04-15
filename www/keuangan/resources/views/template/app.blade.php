<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin | @yield('title')</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css')}}" />
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <style>
    /* Add your CSS styles here */
    .sub-menu {
        display: none;
    }

    .sidebar-item.active .sub-menu {
        display: block;
    }
</style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="/" class="text-nowrap logo-img">
            <br>
            <img src="{{ asset('assets/images/logos/K1Zura.png')}}" width="80" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Menu</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#" onclick="toggleSubMenu('dataMaster')" aria-expanded="false">
                    <span>
                        <i class="ti ti-align-right"></i>
                    </span>
                    <span class="hide-menu">Data Master</span>
                </a>
                <ul class="nav flex-column sub-menu" id="dataMaster">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/data-siswa" aria-expanded="false">
                            <span>
                                <i class="material-icons dp48">assignment_ind</i>
                            </span>
                            <span class="hide-menu">Data Siswa</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/data-kelas" aria-expanded="false">
                            <span>
                                <i class="material-icons dp48">class</i>
                            </span>
                            <span class="hide-menu">Data Kelas</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/data-kejuruan" aria-expanded="false">
                            <span>
                                <i class="material-icons dp48">account_balance</i>
                            </span>
                            <span class="hide-menu">Data Kejuruan</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/data-tahun-ajaran" aria-expanded="false">
                            <span>
                                <i class="material-icons dp48">import_contacts</i>
                            </span>
                            <span class="hide-menu">Data Tahun Ajaran</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/data-pembayaran" aria-expanded="false">
                            <span>
                                <i class="material-icons dp48">monetization_on</i>
                            </span>
                            <span class="hide-menu">Data Pembayaran</span>
                        </a>
                    </li>
                </ul>
            </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="/pembayaran" aria-expanded="false">
                  <span>
                    <i class="las la-dollar-sign"></i>
                  </span>
                  <span class="hide-menu">Pembayaran</span>
                </a>
              </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            @yield('content')
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/js/sidebarmenu.js')}}"></script>
  <script src="{{ asset('assets/js/app.min.js')}}"></script>
  <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{ asset('assets/js/dashboard.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <!-- JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script>
    function toggleSubMenu(subMenuId) {
        var subMenu = document.getElementById(subMenuId);
        if (subMenu.style.display === 'none' || subMenu.style.display === '') {
            subMenu.style.display = 'block';
        } else {
            subMenu.style.display = 'none';
        }
    }
</script>


{{-- Siswa --}}
<script type="text/javascript">
    $(function () {

      /*------------------------------------------
       --------------------------------------------
       Pass Header Token
       --------------------------------------------
       --------------------------------------------*/
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });

      /*------------------------------------------
      --------------------------------------------
      Render DataTable
      --------------------------------------------
      --------------------------------------------*/
      $('#kelasForm').hide();
      $('#kejuruanForm').hide();
      $('#tahunAjaranForm').hide();
      $('#pembayaranForm').hide();
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('data-siswa.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nis', name: 'nis'},
              {data: 'nama', name: 'nama'},
              {data: 'nama_kelas', name: 'nama_kelas'},
              {data: 'kejuruan', name: 'kejuruan'},
              {data: 'tahun_ajaran', name: 'tahun_ajaran'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });

      /*------------------------------------------
      --------------------------------------------
      Click to Button
      --------------------------------------------
      --------------------------------------------*/
      $('#createNewProduct').click(function () {
          $('#saveBtn').val("create-product");
          $('#product_id').val('');
          $('#productForm').trigger("reset");
          $('#modelHeading').html("Tambah Siswa Baru");
          $('#ajaxModel').modal('show');
          $('#productForm').show();
          loadClassesDropdown();
          loadKejuruanDropdown();
          loadTahunAjaranDropdown();
      });
      /*------------------------------------------
      --------------------------------------------
      Click to Edit Button
      --------------------------------------------
      --------------------------------------------*/
      $('body').on('click', '.editSiswa', function () {
        var product_id = $(this).data('id');
        $.get("{{ route('data-siswa.index') }}" +'/' + product_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Siswa");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#productForm').show();
            $('#product_id').val(data.id);
            $('#nis').val(data.nis);
            $('#nama').val(data.nama);
            loadClassesDropdown();
            loadKejuruanDropdown();
        })
      });

      /*------------------------------------------
      --------------------------------------------
      Create Product Code
      --------------------------------------------
      --------------------------------------------*/
      $('#saveBtn').click(function (e) {
          e.preventDefault();
          var originalBtnText = $(this).html();
          $(this).html('Sending..');

          $.ajax({
            data: $('#productForm').serialize(),
            url: "{{ route('data-siswa.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {

                $('#productForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                $('#saveBtn').html(originalBtnText);
                table.draw();
                Swal.fire(
                'Success!',
                'File anda sudah disimpan.',
                'success'
                );

            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html(originalBtnText);
            }
        });
      });
      function loadClassesDropdown() {
        $.ajax({
            url: "{{ route('get-kelas') }}",
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#kelas_id').empty();
                $.each(data, function (key, value) {
                    $('#kelas_id').append('<option value="' + key + '">' + value + '</option>');
                });
            },
                error: function (data) {
                    console.log('Error fetching classes:', data);
                }
            });
        }
        function loadKejuruanDropdown() {
        $.ajax({
            url: "{{ route('get-kejuruan') }}",
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#kejuruan_id').empty();
                $.each(data, function (key, value) {
                    $('#kejuruan_id').append('<option value="' + key + '">' + value + '</option>');
                });
            },
                error: function (data) {
                    console.log('Error fetching classes:', data);
                }
            });
        }
        function loadTahunAjaranDropdown() {
        $.ajax({
            url: "{{ route('get-tahun-ajaran') }}",
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#tahun_ajaran_id').empty();
                $.each(data, function (key, value) {
                    $('#tahun_ajaran_id').append('<option value="' + key + '">' + value + '</option>');
                });
            },
                error: function (data) {
                    console.log('Error fetching classes:', data);
                }
            });
        }

      /*------------------------------------------
      --------------------------------------------
      Delete Product Code
      --------------------------------------------
      --------------------------------------------*/
      $('body').on('click', '.deleteSiswa', function () {
          var product_id = $(this).data("id");
          Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data ini tidak akan kembali lagi!!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('data-siswa.store') }}"+'/'+product_id,
                        success: function (data) {
                            table.draw();
                            Swal.fire(
                            'Deleted!',
                            'Data Anda sudah dihapus.',
                            'success'
                            );
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });
        });

    });
</script>


{{-- kelas --}}
<script type="text/javascript">
    $(function () {

    /*------------------------------------------
    --------------------------------------------
    Pass Header Token
    --------------------------------------------
    --------------------------------------------*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*------------------------------------------
    --------------------------------------------
    Render DataTable
    --------------------------------------------
    --------------------------------------------*/
    $('#productForm').hide();
    $('#kejuruanForm').hide();
    $('#tahunAjaranForm').hide();
    $('#pembayaranForm').hide();
      var table = $('.data-table-kelas').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('data-kelas.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nama_kelas', name: 'nama_kelas'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    $('#createNewKelas').click(function () {
          $('#saveBtnKelas').val("create-Kelas");
          $('#kelas_id').val('');
          $('#kelasForm').trigger("reset");
          $('#modelHeading').html("Tambah Kelas Baru");
          $('#ajaxModel').modal('show');
          $('#kelasForm').show();
      });
    /*------------------------------------------
    --------------------------------------------
    Click to Edit Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editKelas', function () {
    var kelas_id = $(this).data('id');
    $.get("{{ route('data-kelas.index') }}" +'/' + kelas_id +'/edit', function (data) {
        $('#modelHeading').html("Edit Kelas");
        $('#saveBtnKelas').val("edit-Kelas");
        $('#ajaxModel').modal('show');
        $('#kelasForm').show();
        $('#kelas_id').val(data.id);
        $('#nama_kelas').val(data.nama_kelas);
    })
    });

    /*------------------------------------------
    --------------------------------------------
    Create Product Code
    --------------------------------------------
    --------------------------------------------*/
    $('#saveBtnKelas').click(function (e) {
    e.preventDefault();
    var originalBtnText = $(this).html();
    $(this).html('Sending..');

    $.ajax({
        data: $('#kelasForm').serialize(),
        url: "{{ route('data-kelas.store') }}",
        type: "POST",
        dataType: 'json',
        success: function (data) {
            // Berhasil, ubah teks tombol kembali ke "Save"
            $('#saveBtnKelas').html(originalBtnText);

            $('#kelasForm').trigger("reset");
            $('#ajaxModel').modal('hide');
            table.draw();
            Swal.fire(
            'Success!',
            'File anda sudah disimpan.',
            'success'
            );

        },
        error: function (data) {
            // Terjadi kesalahan, ubah teks tombol kembali ke "Save"
            $('#saveBtnKelas').html(originalBtnText);

            console.log('Error:', data);
        }
    });
});


    /*------------------------------------------
    --------------------------------------------
    Delete Product Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deleteKelas', function () {
        var kelas_id = $(this).data("id");
        Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data ini tidak akan kembali lagi!!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    type: "DELETE",
                    url: "{{ route('data-kelas.store') }}"+'/'+kelas_id,
                    success: function (data) {
                        table.draw();
                            Swal.fire(
                            'Deleted!',
                            'Data Anda sudah dihapus.',
                            'success'
                            );
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
    });
});
</script>


{{-- kejuruan --}}
<script type="text/javascript">
    $(function () {

    /*------------------------------------------
    --------------------------------------------
    Pass Header Token
    --------------------------------------------
    --------------------------------------------*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*------------------------------------------
    --------------------------------------------
    Render DataTable
    --------------------------------------------
    --------------------------------------------*/
    $('#kelasForm').hide();
    $('#productForm').hide();
    $('#tahunAjaranForm').hide();
    $('#pembayaranForm').hide();
      var table = $('.data-table-kejuruan').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('data-kejuruan.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'kejuruan', name: 'kejuruan'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    $('#createNewKejuruan').click(function () {
          $('#saveBtnKejuruan').val("create-Kejuruan");
          $('#kejuruan_id').val('');
          $('#kejuruanForm').trigger("reset");
          $('#modelHeading').html("Tambah Kejuruan Baru");
          $('#ajaxModel').modal('show');
          $('#kejuruanForm').show();
      });
    /*------------------------------------------
    --------------------------------------------
    Click to Edit Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editKejuruan', function () {
    var kejuruan_id = $(this).data('id');
    $.get("{{ route('data-kejuruan.index') }}" +'/' + kejuruan_id +'/edit', function (data) {
        $('#modelHeading').html("Edit Kejuruan");
        $('#saveBtnKejuruan').val("edit-Kejuruan");
        $('#ajaxModel').modal('show');
        $('#kejuruanForm').show();
        $('#kejuruan_id').val(data.id);
        $('#kejuruan').val(data.kejuruan);
    })
    });

    /*------------------------------------------
    --------------------------------------------
    Create Product Code
    --------------------------------------------
    --------------------------------------------*/
    $('#saveBtnKejuruan').click(function (e) {
        e.preventDefault();
        var originalBtnText = $(this).html();
        $(this).html('Sending..');

        $.ajax({
        data: $('#kejuruanForm').serialize(),
        url: "{{ route('data-kejuruan.store') }}",
        type: "POST",
        dataType: 'json',
        success: function (data) {

            $('#saveBtnKejuruan').html(originalBtnText);

            $('#kejuruanForm').trigger("reset");
            $('#ajaxModel').modal('hide');
            table.draw();
            Swal.fire(
            'Success!',
            'File anda sudah disimpan.',
            'success'
            );

        },
        error: function (data) {
            console.log('Error:', data);
            $('#saveBtn').html(originalBtnText);
        }
    });
    });

    /*------------------------------------------
    --------------------------------------------
    Delete Product Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deleteKejuruan', function () {

        var kejuruan_id = $(this).data("id");
        Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data ini tidak akan kembali lagi!!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    type: "DELETE",
                    url: "{{ route('data-kejuruan.store') }}"+'/'+kejuruan_id,
                    success: function (data) {
                        table.draw();
                        Swal.fire(
                            'Deleted!',
                            'Data Anda sudah dihapus.',
                            'success'
                        );
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });


    });

});
</script>


{{-- Tahun Ajaran --}}
<script type="text/javascript">
    $(function () {

    /*------------------------------------------
    --------------------------------------------
    Pass Header Token
    --------------------------------------------
    --------------------------------------------*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*------------------------------------------
    --------------------------------------------
    Render DataTable
    --------------------------------------------
    --------------------------------------------*/
    $('#kelasForm').hide();
    $('#productForm').hide();
    $('#kejuruanForm').hide();
    $('#pembayaranForm').hide();
    var table = $('.data-table-tahun-ajaran').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('data-tahun-ajaran.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'tahun_ajaran', name: 'tahun_ajaran'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    $('#createNewTahunAjaran').click(function () {
          $('#saveBtnTahunAjaran').val("create-Tahun-Ajaran");
          $('#tahunAjaran_id').val('');
          $('#tahunAjaranForm').trigger("reset");
          $('#modelHeading').html("Tambah Tahun Ajaran Baru");
          $('#ajaxModel').modal('show');
          $('#tahunAjaranForm').show();
      });
    /*------------------------------------------
    --------------------------------------------
    Click to Edit Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editTahunAjaran', function () {
    var tahunAjaran_id = $(this).data('id');
    $.get("{{ route('data-tahun-ajaran.index') }}" +'/' + tahunAjaran_id +'/edit', function (data) {
        $('#modelHeading').html("Edit Tahun Ajaran");
        $('#saveBtnTahunAjaran').val("edit-Tahun-Ajaran");
        $('#ajaxModel').modal('show');
        $('#tahunAjaranForm').show();
        $('#tahunAjaran_id').val(data.id);
        $('#tahun_ajaran').val(data.tahun_ajaran);
    })
    });

    /*------------------------------------------
    --------------------------------------------
    Create Product Code
    --------------------------------------------
    --------------------------------------------*/
    $('#saveBtnTahunAjaran').click(function (e) {
        e.preventDefault();
        var originalBtnText = $(this).html();
        $(this).html('Sending..');

        $.ajax({
        data: $('#tahunAjaranForm').serialize(),
        url: "{{ route('data-tahun-ajaran.store') }}",
        type: "POST",
        dataType: 'json',
        success: function (data) {

            $('#tahunAjaranForm').trigger("reset");
            $('#ajaxModel').modal('hide');
            $('#saveBtnTahunAjaran').html(originalBtnText);
            table.draw();
            Swal.fire(
            'Success!',
            'File anda sudah disimpan.',
            'success'
            );

        },
        error: function (data) {
            console.log('Error:', data);
            $('#saveBtnTahunAjaran').html('Save Changes');
        }
    });
    });

    /*------------------------------------------
    --------------------------------------------
    Delete Product Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deleteTahunAjaran', function () {

        var tahunAjaran_id = $(this).data("id");
        Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data ini tidak akan kembali lagi!!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    type: "DELETE",
                    url: "{{ route('data-tahun-ajaran.store') }}"+'/'+tahunAjaran_id,
                    success: function (data) {
                        table.draw();
                        Swal.fire(
                            'Deleted!',
                            'Data Anda sudah dihapus.',
                            'success'
                        );

                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
    });

});
</script>

{{-- Pembayaran --}}
<script type="text/javascript">
    $(function () {


      /*------------------------------------------
       --------------------------------------------
       Pass Header Token
       --------------------------------------------
       --------------------------------------------*/
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });

      /*------------------------------------------
      --------------------------------------------
      Render DataTable
      --------------------------------------------
      --------------------------------------------*/
      $('#kelasForm').hide();
      $('#kejuruanForm').hide();
      $('#tahunAjaranForm').hide();
      $('#productForm').hide();
      var table = $('.data-table-pembayaran').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('data-pembayaran.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'kategori', name: 'kategori'},
              {data: 'tahun_ajaran', name: 'tahun_ajaran'},
              {data: 'nama_kelas', name: 'nama_kelas'},
              {
                data: 'nominal',
                name: 'nominal',
                    render: function (data, type, full, meta) {
                        return Number(data).toLocaleString();
                    }
                },
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });

      /*------------------------------------------
      --------------------------------------------
      Click to Button
      --------------------------------------------
      --------------------------------------------*/
      $('#createNewPembayaran').click(function () {
          $('#saveBtnPembayaran').val("create-Pembayaran");
          $('#pembayaran_id').val('');
          $('#pembayaranForm').trigger("reset");
          $('#modelHeading').html("Tambah kategori pembayaran baru");
          $('#ajaxModel').modal('show');
          $('#pembayaranForm').show();
          loadKelasDropdown();
          loadTahunAjaranDropdown();
      });
      /*------------------------------------------
      --------------------------------------------
      Click to Edit Button
      --------------------------------------------
      --------------------------------------------*/
      $('body').on('click', '.editPembayaran', function () {
            var pembayaran_id = $(this).data('id');
            $.get("{{ route('data-pembayaran.index') }}" +'/' + pembayaran_id +'/edit', function (data) {
                $('#modelHeading').html("Edit Pembayaran");
                $('#saveBtnPembayaran').val("edit-pembayaran");
                $('#ajaxModel').modal('show');
                $('#pembayaranForm').show();
                $('#pembayaran_id').val(data.id);
                $('#kategori').val(data.kategori);
                $('#nominal').val(data.nominal);
                loadKelasDropdown(data.class_id);
                loadTahunAjaranDropdown(data.tahun_ajaran_id);
            });
        });

      /*------------------------------------------
      --------------------------------------------
      Create Product Code
      --------------------------------------------
      --------------------------------------------*/
      $('#saveBtnPembayaran').click(function (e) {
          e.preventDefault();
          var originalBtnText = $(this).html();
          $(this).html('Sending..');

          $.ajax({
            data: $('#pembayaranForm').serialize(),
            url: "{{ route('data-pembayaran.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {

                $('#pembayaranForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                $('#saveBtnPembayaran').html(originalBtnText);
                table.draw();
                Swal.fire(
                'Success!',
                'File anda sudah disimpan.',
                'success'
                );

            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtnPembayaran').html(originalBtnText);
            }
        });
      });
      function loadTahunAjaranDropdown(selectedTahunAjaranId) {
            $.ajax({
                url: "{{ route('get-tahun-ajaran') }}",
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#tahun_ajaran_id').empty();
                    $.each(data, function (key, value) {
                        var selected = (key == selectedTahunAjaranId) ? 'selected' : '';
                        $('#tahun_ajaran_id').append('<option value="' + key + '" ' + selected + '>' + value + '</option>');
                    });
                },
                error: function (data) {
                    console.log('Error Tahun Ajaran:', data);
                }
            });
        }
        function loadKelasDropdown(selectedKelasId) {
        $.ajax({
            url: "{{ route('get-kelas') }}",
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#class_id').empty();
                $.each(data, function (key, value) {
                    var selected = (key == selectedKelasId) ? 'selected' : '';
                    $('#class_id').append('<option value="' + key + '" ' + selected + '>' + value + '</option>');
                });
            },
                error: function (data) {
                    console.log('Error fetching classes:', data);
                }
            });
        }

      /*------------------------------------------
      --------------------------------------------
      Delete Product Code
      --------------------------------------------
      --------------------------------------------*/
      $('body').on('click', '.deletePembayaran', function () {
          var pembayaran_id = $(this).data("id");
          Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data ini tidak akan kembali lagi!!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('data-pembayaran.store') }}"+'/'+pembayaran_id,
                        success: function (data) {
                            table.draw();
                            Swal.fire(
                            'Deleted!',
                            'Data Anda sudah dihapus.',
                            'success'
                            );
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function(){
        $('#searchBtn').click(function(){
            var query = $('#search').val();
            $.ajax({
                url: "{{ route('search') }}",
                method: 'GET',
                data: {query: query},
                dataType: 'json',
                success: function(data){
                    $('#siswaTableBody').html(data.html);
                    updateKondisiColumn();
                }
            });
        });
        $('#toggle-button').click(function(){
            var id = $(this).data('id');
            toggleKondisi(id);
        });
    function toggleKondisi(id) {
        // Make an AJAX request to toggle the boolean value
        $.ajax({
            url: "{{ route('toggle-kondisi') }}", // Update the route to your actual route
            method: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function(data){
                // Update the table or handle the response as needed
                if (data.success) {
                    // Reload or update the table data
                    // You might want to reload the entire table or just update the specific cell
                    updateKondisiColumn();
                } else {
                    alert('Failed to toggle Kondisi.');
                }
            }
        });
    }
    function updateKondisiColumn() {
        // Iterate through each row and validate the Kondisi column
        $('#siswaTableBody tr').each(function() {
            var kondisiData = $(this).find('.kondisi-column').text(); // Assuming 'kondisi-column' is the class name
            // Add your validation rules here
            if (!isValidKondisi(kondisiData)) {
                // You may highlight the row or take other actions for invalid data
                $(this).addClass('invalid-row');
            }
        });
    }

    function isValidKondisi(kondisi) {
        // Add your validation rules here
        // Example: Check if the kondisi is 'Valid' or 'Invalid'
        return kondisi === 'Valid' || kondisi === 'Invalid';
    }
});
</script>
</body>
</html>
