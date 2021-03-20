<?php
// session_start();
// if(!isset($_SESSION['admin'])) {
//    header('Location: ../login');
// }
require "../menus.php";
$pageName = 'Dashboard';
$level = "../../../";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Twubs |
        <?php echo $pageName;?>
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo $level;?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $level;?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo $level;?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo $level;?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $level;?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $level;?>dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .description-text {
            font-weight: 600;
        }

        tr.group,
        tr.group:hover {
            background-color: #ddd !important;
        }

        .head-row {
            color: red;
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php
         echo getHeader($level);
         ?>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <?php
            // echo getSideBar($pageName,$level);
            ?>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>View All Sheets</small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Hashtags</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="sheet1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Hashtags</th>
                                                <th>Tags</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?php echo $level;?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo $level;?>bower_components/jquery-ui/jquery-ui.min.js"></script>
    https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo $level;?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo $level;?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $level;?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo $level;?>bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $level;?>dist/js/adminlte.min.js"></script>

    <script>
        DT1 = null;
        DT2 = null;
        $(document).ready(function() {
            getAllSheets();
        });

        function getAllSheets() {
          let tokenn = window.localStorage.getItem('token');
            $.post("http://twubsapp.studentrac.com/regapi", {
                'token': tokenn
            }, function(response) {
                var data = jQuery.parseJSON(response);
                if(data['success'] = true)
                {
                  table = $('#sheet1 > tbody');
                  $.each(data['result'], function(idx, result) {
                      //console.log(sheet);
                      html = '<tr>';
                      html += '<td>' + new Date(result['timestamp']).toDateInputValue() + '</td>';

                      html += '<td>' + result['hashtag'] + '</td>';
                      html += '<td>' + result['tags'] + '</td>';
                      html += '<td> @' + result['username'] + '</td>';
                      html += '<td> ' + result['contactEmail'] + '</td>';

                      table.prepend(html);
                  });
                  $('#sheet1').DataTable({
                      "order": [
                          [1, "desc"]
                      ]
                  });
                }
                else{
                    window.location = '../login';
                }

            });
        }

        function remove(id, type) {
            if (confirm('Are you sure you want to remove this ' + type + ' sheet?')) {
                $.post("../../../sheetController.php", {
                    'action': 'removeSheet',
                    'id': id
                }, function(response) {
                    //console.log(response);
                    window.location = '../dashboard';
                });
            }
        }

        function view(id) {
          $('#printBtn').show();
            sheet = $('.viewsheet');
            $(sheet).hide();
            $(sheet).find('#table2').hide();
            $(sheet).find('#table1').hide();
            $(sheet).find('#table3').hide();
            $(sheet).find('#table4').hide();
            $(sheet).find('#modsheetdata').hide();

            $('.statsrow').show();
            OPT_SET = {
                'complete': '<span class="label label-success">Complete</span>',
                'notstarted': '<span class="label label-default">Not Started</span>',
                'onplan': '<span class="label label-info">On Plan</span>',
                'issues': '<span class="label label-danger">Issues</span>'
            };
            OPT_SET_BACK = {
                'complete': '#adb',
                'notstarted': 'white',
                'onplan': '#add',
                'issues': '#ff000026'
            };
            OPT_SET_COUNT = {
                'complete': 0,
                'notstarted': 0,
                'onplan': 0,
                'issues': 0
            };
            $.post("../../../sheetController.php", {
                'action': 'getSheetById',
                'id': id
            }, function(response) {
                OPT_SET_COUNT = {
                    'complete': 0,
                    'notstarted': 0,
                    'onplan': 0,
                    'issues': 0
                };
                if (DT1 != null)
                    DT1.destroy();
                if (DT2 != null)
                    DT2.destroy();
                data = jQuery.parseJSON(response);
                console.log(data);
                //data['data'] = data['data']['tasks'];
                $(sheet).find('.widget-user-username').html(data['author']);

                if (data['name'] == "Electrical Maintainance")
                    data['name'] += '[' + data['data']['period'] + ']';
                $(sheet).find('.widget-user-sheetname').html(data['name']);
                $(sheet).find('.widget-user-desc').html(data['authordpolan']);

                if (data['name'] != "Oven Checks") {

                    if (data['name'] == "Lightning Audit") {
                        $('.statsrow').hide();
                        $(sheet).find('#table4').show();
                        table = $(sheet).find('#table4 tbody');
                        table.html('');
                        $.each(data['data']['rows'], function(idx, row) {
                            console.log(row);
                            html = '<tr>';
                            html += '<td>' + row['DRAWING'] + '</td>';
                            html += '<td>' + row['FITTING_LANE_ID'] + '</td>';
                            html += '<td>' + row['FITTING_ID_NUMBER'] + '</td>';
                            html += '<td>' + row['HIGH_or_LOW_LEVEL'] + '</td>';
                            html += '<td>' + row['FAULT'] + '</td>';
                            html += '<td>' + row['ACCESS'] + '</td>';
                            html += '</tr>';
                            table.append(html);
                        });
                        $(sheet).show();
                        DT1 = $('#table4 > table').DataTable({
                            "ordering": false,
                            "paging": false,
                            "searching": false
                        });
                    } else if (data['name'] == "Steel Dept.Modifcation Sheet") {
                        sheetData = data['data'];
                        $('.statsrow').hide();
                        $(sheet).find('.widget-user-username').html(new Date(data['datetime']).toDateInputValue());
                        container = $('#modsheetdata');
                        $(container).find('#line').html(sheetData['line']);
                        $(container).find('#machine').html(sheetData['machine']);
                        $(container).find('#date').html(sheetData['date']);
                        $(container).find('#sheetnumber').html(sheetData['sheetnumber']);
                        $(container).find('#intiated').html(sheetData['intiated']);
                        $(container).find('#requested').html(sheetData['requested']);
                        $(container).find('#checked').html(sheetData['checked']);
                        $(container).find('#reasons').html(sheetData['reasons']);
                        $(container).find('#details').html(sheetData['details']);
                        $(container).find('#drawinglocation').html(sheetData['drawinglocation']);
                        $(container).find('#backupinformation').html(sheetData['backupinformation']);
                        if ('rugNumberMod' in sheetData) {
                            tableRows = $(container).find('.rugNumberMod');
                            i = 0;
                            $(tableRows).each(function() {
                                if (sheetData['rugNumberMod'].length > i) {
                                    $(this).html(sheetData['rugNumberMod'][i]);
                                }
                            });
                        }
                        if ('drawMod' in sheetData) {
                            tableRows = $(container).find('.drawMod');
                            i = 0;
                            $(tableRows).each(function() {
                                if (sheetData['drawMod'].length > i) {
                                    $(this).html(sheetData['drawMod'][i]);
                                }
                            });
                        }
                        $(container).show();
                        $(sheet).show();

                    } else if (data['name'] == "Audit Sheet Motors") {

                        $(sheet).find('#table3').show();
                        table = $(sheet).find('#table3 tbody');
                        table.html('');
                        $.each(data['data']['audits'], function(idx, audits) {
                            //console.log(month, checks);
                            html = '<tr>';
                            html += '<td>' + audits['refnum'] + '</td>';
                            html += '<td>' + audits['stockref'] + '</td>';
                            html += '<td>' + audits['desc'] + '</td>';
                            html += '<td>' + audits['qty'] + '</td>';
                            html += '<td>' + audits['req'] + '</td>';
                            html += '</tr>';
                            table.append(html);
                        });
                        $(sheet).show();
                        DT1 = $('#table3 > table').DataTable({
                            "ordering": false,
                            "paging": false,
                            "searching": false
                        });
                    } else if (data['name'] == "Audit Sheet Conversion Press Spares") {
                        $(sheet).find('#table3').show();
                        table = $(sheet).find('#table3 tbody');
                        table.html('');
                        $.each(data['data']['audits'], function(idx, audits) {
                            //console.log(month, checks);
                            html = '<tr>';
                            html += '<td>' + audits['refnum'] + '</td>';
                            html += '<td>' + audits['stockref'] + '</td>';
                            html += '<td>' + audits['desc'] + '</td>';
                            html += '<td>' + audits['qty'] + '</td>';
                            html += '<td>' + audits['req'] + '</td>';
                            html += '</tr>';
                            table.append(html);
                        });
                        $(sheet).show();
                        DT1 = $('#table3 > table').DataTable({
                            "ordering": false,
                            "paging": false,
                            "searching": false
                        });
                    } else {
                        $(sheet).find('#table1').show();
                        table = $(sheet).find('#table1 tbody');
                        table.html('');
                        $.each(data['data']['tasks'], function(catname, catagory) {
                            $.each(catagory, function(idx, row) {
                                //console.log(catname, row);
                                html = '<tr>';
                                if (parseInt(row['id']) === row['id'])
                                    html += '<td>' + parseInt(row['id']) + '</td>';
                                else
                                    html += '<td>' + parseFloat(row['id']) + '</td>';
                                html += '<td>' + row['task'] + '</td>';
                                html += '<td>' + row['catagory'] + '</td>';
                                html += '<td>' + row['actions'] + '</td>';
                                html += '<td class="text-center">' + OPT_SET[row['status']] + '</td>';
                                OPT_SET_COUNT[row['status']]++;
                                html += '<td>' + row['date'] + '</td>';
                                html += '<td>' + row['comments'] + '</td>';
                                html += '<td>' + row['deliverables'] + '</td>';
                                html += '<td>' + row['initials'] + '</td>';
                                html += '</tr>';
                                table.prepend(html);
                            });
                        });
                        $(sheet).show();
                        applyDTByGroup('table1 > table', 2);
                    }
                } else {

                    $(sheet).find('#table2').show();
                    table = $(sheet).find('#table2 tbody');
                    table.html('');
                    $.each(data['data']['checks'], function(month, checks) {
                        //console.log(month, checks);
                        html = '<tr>';
                        html += '<td>' + checks['month'] + '</td>';
                        html += '<td style="background:' + OPT_SET_BACK[checks['WASHER LINE']['status']] + '">' + checks['WASHER LINE']['intials'] + '</td>';
                        OPT_SET_COUNT[checks['WASHER LINE']['status']]++;
                        html += '<td style="background:' + OPT_SET_BACK[checks['WASHER LINE2']['status']] + '">' + checks['WASHER LINE2']['intials'] + '</td>';
                        OPT_SET_COUNT[checks['WASHER LINE2']['status']]++;
                        html += '<td style="background:' + OPT_SET_BACK[checks['DECO OVEN LINE']['status']] + '">' + checks['DECO OVEN LINE']['intials'] + '</td>';
                        OPT_SET_COUNT[checks['DECO OVEN LINE']['status']]++;
                        html += '<td style="background:' + OPT_SET_BACK[checks['IBO LINE']['status']] + '">' + checks['IBO LINE']['intials'] + '</td>';
                        OPT_SET_COUNT[checks['IBO LINE']['status']]++;
                        html += '</tr>';
                        table.append(html);
                    });
                    $(sheet).show();
                    DT1 = $('#table2 > table').DataTable({
                        "ordering": false,
                        "paging": false,
                        "searching": false
                    });
                }


                $('#completedcount').html(OPT_SET_COUNT['complete']);
                $('#notstartedcount').html(OPT_SET_COUNT['notstarted']);
                $('#onplancount').html(OPT_SET_COUNT['onplan']);
                $('#issuescount').html(OPT_SET_COUNT['issues']);
            });
        }

        function applyDTByGroup(tableName, groupColumn) {
            DT1 = $('#' + tableName).DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": groupColumn
                }],
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(groupColumn, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="8">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                }
            });

            // Order by the grouping
            $('#' + tableName + ' tbody').on('click', 'tr.group', function() {
                var currentOrder = DT1.order()[0];
                if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
                    DT1.order([groupColumn, 'desc']).draw();
                } else {
                    DT1.order([groupColumn, 'asc']).draw();
                }
            });
        }
        Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0, 10);
        });
    </script>
    <!-- Print View START -->
    <script language="javascript">
    var gAutoPrint = true;

    function logoutt(){
      $.post("http://twubsapp.studentrac.com/logoutreact", {
          'action': 'logout'
      }, function(response) {
          console.log(response);

          var data = jQuery.parseJSON(response);
          console.log(data);

          if(data['success']==true){
            window.localStorage.removeItem('token');
            window.location = '../login';
          }
          else{
            alert('Failed!! Try Again');
          }

      });
    }

    function processPrint(){

    if (document.getElementById != null){
    var html = '<HTML>\n<HEAD>\n';
    if (document.getElementsByTagName != null){
    var headTags = document.getElementsByTagName("head");
    if (headTags.length > 0) html += headTags[0].innerHTML;
    }

    html += '\n</HE' + 'AD>\n<BODY>\n';
    var printReadyElem = document.getElementById("printMe");

    if (printReadyElem != null) html += printReadyElem.innerHTML;
    else{
    alert("Error, no contents.");
    return;
    }

    html += '\n</BO' + 'DY>\n</HT' + 'ML>';
    var printWin = window.open("","processPrint");
    printWin.document.open();
    printWin.document.write(html);
    printWin.document.close();

    if (gAutoPrint) printWin.print();
    } else alert("Browser not supported.");

    }
</script>
    <!-- Print View END -->
</body>

</html>
