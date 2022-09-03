@extends('admin.admin_master')
@section('content')

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/custom_dt_custom.css') }}">
    <!-- END PAGE LEVEL CUSTOM STYLES -->

<div id="content" class="main-content">
<div class="seperator-header ">
    <h4 class="">ALL SUBCATEGORY</h4>
</div>
<div class="layout-px-spacing">



<div class="row layout-spacing">
    <div class="col-lg-8">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <table id="style-3" class="table style-3  table-hover">
                        <thead>
                            <tr>
                                <th>Category </th>
                                <th>Sub Category En</th>
                                <th>Sub Category Ban</th>
                                <th class="text-center dt-no-sorting">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                        @foreach($subcategory as $item)
                            <tr>
                                <td>{{ $item->category_id }}</td>
                                <td>{{ $item->subcategory_name_en }}</td>
                                <td>{{ $item->subcategory_name_ban }}</td>
                                
                                <td class="text-center">
                        
                                    <a href="{{ route('subcategory.edit',$item->id) }}" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></a>
                                            
                                    <a href="{{ route('subcategory.delete',$item->id) }}" id="delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>

                                    
                                </td>
                            </tr>
                        @endforeach

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- col end --}}
  
{{-- Add Brand section  --}}
    <div class="col-lg-4">
        <div class="seperator-header">
            <h4 class="">ADD NEW SUBCATEGORY</h4>
        </div>

        
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <form method="post" action="{{ route('subcategory.store') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <p><span class="text-danger">Category Select</span><span class="text-danger">*</span></p>
                            
                            <div class="controls">
                                <select name="category_id" class="form-control"  >
                                    <option value="" selected="" disabled="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>	
                                    @endforeach
                                </select>
                                @error('category_id') 
                             <span class="text-danger">{{ $message }}</span>
                             @enderror 
                             </div>
                    </div>


                    <div class="form-group mb-4">
                        <input type="text" class="form-control" name="subcategory_name_en" placeholder="SubCategory Name En *">
                        @error('subcategory_name_en') 
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <input type="text" class="form-control" name="subcategory_name_ban" placeholder="SubCategory Name Bn*">
                        @error('subcategory_name_ban') 
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  
                
                    
                    <button type="submit" class="btn bg-primary mt-3">ADD SUBCATEGORY</button>
                </form>
                </div>
            </div>
        </div>




    </div>

</div>

</div>
<script src="{{ asset('backend/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('backend/plugins/table/datatable/datatables.js') }}"></script>
    <script>
   
        c3 = $('#style-3').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5
        });

        // multiCheck(c3);
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->

@endsection

