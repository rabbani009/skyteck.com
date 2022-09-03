@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/table/datatable/custom_dt_custom.css') }}">
    <!-- END PAGE LEVEL CUSTOM STYLES -->

<div id="content" class="main-content">

<div class="layout-px-spacing">
    
    {{-- col end --}}
  
{{-- Add Brand section  --}}
    <div class="col-lg-8">
        <div class="seperator-header">
            <h4 class="">UPDATE SUB->SUBCATEGORY</h4>
        </div>

        
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <form method="post" action="{{ route('subsubcategory.update') }}" enctype="multipart/form-data">
                        @csrf
            <input type="hidden" name="id" value="{{ $subsubcategories->id }}">	
                    <div class="form-group">
                        <p><span class="text-danger">Category Select</span><span class="text-danger">*</span></p>
                            
                            <div class="controls">
                                <select name="category_id" class="form-control"  >
                                    <option value="" selected="" disabled="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $subsubcategories->category_id ? 'selected':'' }}>{{ $category->category_name_en }}</option>	
                                    @endforeach
                                </select>
                                @error('category_id') 
                             <span class="text-danger">{{ $message }}</span>
                             @enderror 
                             </div>
                             
                    </div>

                    <div class="form-group">
                        <p><span class="text-danger">Sub Category Select</span><span class="text-danger">*</span></p>
                            
                            <div class="controls">
                                <select name="subcategory_id" class="form-control"  >
                                    <option value="" selected="" disabled="">Select SubCategory</option>
                             
                             @foreach($subcategories as $subsub)
                                    <option value="{{ $subsub->id }}" {{ $subsub->id == $subsubcategories->subcategory_id ? 'selected':'' }} >{{ $subsub->subcategory_name_en }}</option>	
                             @endforeach

                                </select>
                                @error('subcategory_id') 
                             <span class="text-danger">{{ $message }}</span>
                             @enderror 
                             </div>
                             
                    </div>


                    <div class="form-group mb-4">
                        <input type="text" class="form-control" name="subsubcategory_name_en" placeholder="Sub->SubCategory Name En *"value="{{ $subsubcategories->subsubcategory_name_en }}">
                        @error('subsubcategory_name_en') 
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <input type="text" class="form-control" name="subsubcategory_name_ban" placeholder="Sub->SubCategory Name Bn*" value="{{ $subsubcategories->subsubcategory_name_ban }}">
                        @error('subsubcategory_name_ban') 
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  
                
                    
                    <button type="submit" class="btn bg-primary mt-3">UPDATE SUB->SUBCATEGORY</button>
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

{{-- SubCategory value show --}}


@endsection

