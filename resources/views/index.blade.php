<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>yajra datatable</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>
    <body>
        
   <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Product List Hear</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered ytable table-striped">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Category</th>
                      <th>Product Name</th>
                      <th>Product Price</th>
                      <th>Product Quantity</th>
                    </tr> 
                  </thead>
                  <tbody>
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Category</th>
                      <th>Product Name</th>
                      <th>Product Price</th>
                      <th>Product Quantity</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
       
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

        <script>
            $(function(){
                var table = $('.ytable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax:"{{route('index')}}",
                    columns:[
                    {data:'DT_RowIndex', name: 'DT_RowIndex'},
                    {data:'category', name: 'category'},
                    {data:'name', name: 'name'},
                    {data:'price', name: 'price'},
                    {data:'quantity', name: 'quantity'},

                    ],
                    "footerCallback":function(row, data){
                        var api = this.api(), data;
                        var intVal = function(i){
                          return typeof i === 'string' ?
                          i.replace(/[\$,]/g, '')*1 :
                          typeof i === 'number' ?
                          i:0;
                        };

                        pQty = api.column( 4, {page: 'current'} )
                            .data().reduce( function (a,b){
                              return intVal(a) + intVal(b);
                            }, 0)
                        $(api.column(4).footer()).html(
                          pQty
                        )  

                         pPrice = api.column( 3, {page: 'current'} )
                            .data().reduce( function (a,b){
                              return intVal(a) + intVal(b);
                            }, 0)
                        $(api.column(3).footer()).html(
                          pPrice
                        )  

                         
                    }
                    
                })
            })
        </script>
    </body>
</html>