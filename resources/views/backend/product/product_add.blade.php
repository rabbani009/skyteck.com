@extends('admin.admin_master')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{asset('backend/assets/css/scrollspyNav.css" rel="stylesheet')}}}" type="text/css" >
<link rel="stylesheet" type="text/css" href="{{asset('backend/plugins/select2/select2.min.css')}}">
<!--  END CUSTOM STYLE FILE  -->



<div id="content" class="main-content">

<div class="container">

    <div class="row layout-top-spacing">

        <div id="basic" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>ADD PRODUCTS</h4>
                        </div>                 
                    </div>
                </div>
                <div class="widget-content widget-content-area">

<form method="post" action="{{ route('product-store') }}" enctype="multipart/form-data" id="appointment_form" >
    @csrf
                        
        <div class="form-row mb-4">
            <div class="form-group col-md-4">
                <label for="inputState">Brand</label>
                <select name="brand_id" class="form-control" required="" >
                    <option value="" selected="" disabled="">Choose..</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>	
                    @endforeach
                </select>

                @error('brand_id') 
                    <span class="text-danger">{{ $message }}</span>
                @enderror


            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Category</label>


                <select name="category_id" class="form-control" required=""  >
                    <option value="" selected="" disabled="">Choose..</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>	
                    @endforeach
                </select>
            @error('category_id') 
                <span class="text-danger">{{ $message }}</span>
                @enderror


            </div>

        <div class="form-group col-md-4">
                
                <label for="inputState">Sub->Category</label>
                    <select name="subcategory_id" class="form-control" required="" >
                        <option value="" selected="" disabled="">Choose..</option>   
                    </select>

                @error('subcategory_id') 
                <span class="text-danger">{{ $message }}</span>
                @enderror

        </div>


        </div>
        {{-- End of from-group --}}




                <div class="form-group mb-4">


                    <select name="subsubcategory_id" class="form-control" required="" >
                        <option value="" selected="" disabled="">SubSubCategory</option>

                        <option value=""></option>	

                    </select>

                @error('subsubcategory_id') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                </div>
                

                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Product Name En</label>
                        <input type="text" name="product_name_en" class="form-control" id="inputEmail4" placeholder="Product Name en" required="" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Product Name Bn</label>
                        <input type="text" name="product_name_ban" class="form-control" id="inputPassword4" placeholder="Product Name ban" required="" >
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Product Code</label>
                        <input type="text" name="product_code" class="form-control" id="inputEmail4" placeholder="Product Code" required="" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Product Quantity</label>
                        <input type="text" name="product_qty" class="form-control" id="inputPassword4" placeholder="Product Quantity" required="" >
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="form-group col-md-4">

                        <div class="widget-content widget-content-area">
                            <label for="inputEmail4">Product Tags En</label>
                        
                            <select class="form-control tagging" name="product_tags_en" multiple="multiple" required="" >
                                <option>orange</option>
                                
                            </select>
                        </div>

                    </div>

                    <div class="form-group col-md-4">

                        <div class="widget-content widget-content-area">
                                <label for="inputEmail4">Product Tags Bn</label>
                                
                                <select class="form-control tagging" name="product_tags_ban" multiple="multiple" required="" >
                                    <option>orange</option>
                                    
                                </select>
                            </div>

                    </div>

                    <div class="form-group col-md-4">

                        <div class="widget-content widget-content-area">
                                <label for="inputEmail4">Product Size  En</label>
                                
                                <select class="form-control tagging" name="product_size_en" multiple="multiple" required="" >
                                    <option>orange</option>
                                    <option>white</option>
                                    <option>purple</option>
                                </select>
                            </div>

                    </div>

                    <div class="form-group col-md-4">

                        <div class="widget-content widget-content-area">
                                <label for="inputEmail4">Product Size  Bn</label>
                                
                                <select class="form-control tagging" name="product_size_ban" multiple="multiple" required="" >
                                    <option>orange</option>
                                    <option>white</option>
                                    <option>purple</option>
                                </select>
                            </div>

                    </div>

                    <div class="form-group col-md-4">

                        <div class="widget-content widget-content-area">
                                <label for="inputEmail4">Product Color  En</label>
                                
                                <select class="form-control tagging" name="product_color_en" multiple="multiple" required="" >
                                    <option>orange</option>
                                   
                                </select>
                            </div>

                    </div>

                    <div class="form-group col-md-4">

                        <div class="widget-content widget-content-area">
                                <label for="inputEmail4">Product Color  Bn</label>
                                
                                <select class="form-control tagging" name="product_color_ban" multiple="multiple" required="" >
                                    <option>orange</option>
                                   
                                </select>
                            </div>

                    </div>




                </div>

    
<div class="form-row mb-4">
                <div class="form-group col-md-6">
                        <label for="inputState">Product Selling Price</label>

                        <input type="text" name="selling_price" class="form-control" placeholder="Selling Price" required="" >
                        
                @error('selling_price') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                </div>
                <div class="form-group col-md-6">
                        <label for="inputState">Product Discount Price</label>
                        <input type="text" name="discount_price" class="form-control" placeholder="Discount Price" required="" >

                        
                    @error('discount_price') 
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                </div>

                
</div>

{{-- images selection start --}}
<div class="form-row mb-4">

        <div class="form-group col-md-6">
            <p><span class="text-success">Thumbnail Image</span><span class="text-danger">*</span></p>
            <input type="file" class="form-control" name="product_thambnail" placeholder="Thumbnail Image*" onChange="mainThamUrl(this)" required="">
            @error('product_thambnail') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <img src="" id="mainThmb">
        </div>
    
        <div class="form-group col-md-6">
            <p><span class="text-success">Multiple Image</span><span class="text-danger">*</span></p>
            <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" required="" >
            @error('multi_img') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="row" id="preview_img"></div>
        </div>

        <div class="form-group col-md-4">
           
        </div>

</div>

    {{-- images selection End --}}

<div class="form-row mb-6">
    <div class="form-group col-md-6">

        <label for="exampleFormControlTextarea1">Short Description en</label>
        <textarea class="form-control" name="short_descp_en" id="exampleFormControlTextarea1" rows="4" required="" ></textarea>

    </div>

    <div class="form-group col-md-6">

        <label for="exampleFormControlTextarea1">Short Description bn</label>
        <textarea class="form-control" name="short_descp_ban" id="exampleFormControlTextarea1" rows="4" required="" ></textarea>

    </div>

</div>

<div class="form-row mb-6">
    <div class="form-group col-md-6">

        <label for="exampleFormControlTextarea1">Long Description en</label>
        <textarea class="form-control" name="long_descp_en" id="exampleFormControlTextarea1" rows="5" required=""></textarea>

    </div>

    <div class="form-group col-md-6">

        <label for="exampleFormControlTextarea1">Long Description bn</label>
        <textarea class="form-control" name="long_descp_ban" id="exampleFormControlTextarea1" rows="5" required="" ></textarea>

    </div>

</div>
                        

<hr/>


<div class="form-row mb-6">
    <div class="col-md-6">
        <div class="form-group">
        
    <div class="controls">
        <fieldset>
            <input type="checkbox" name="hot_deals" id="checkbox_2" name="hot_deals" value="1"  >
            <label for="checkbox_2">Hot Deals</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" name="featured" id="checkbox_3" name="featured" value="1"  >
            <label for="checkbox_3">Featured</label>
        </fieldset>
    </div>
    </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
        
        <div class="controls">
            <fieldset>
                <input type="checkbox" name="special_offer" id="checkbox_4" name="special_offe" value="1"  >
                <label for="checkbox_2">Special offer </label>
            </fieldset>
            <fieldset>
                <input type="checkbox" name="special_deals" id="checkbox_5" name="special_deals" value="1"  >
                <label for="checkbox_3">Special deals</label>
            </fieldset>
        </div>
    </div>
    </div>

</div>
                        
            <button id="register" type="submit" class="btn btn-warning mb-4 mr-2 btn-sm">ADD PRODUCT</button>


</form>
                

                </div>


            </div>
        </div>
        {{-- ADD PRODUCTS TITLE --}}

</div>
    {{-- container ends here --}}

</div>
    {{--Main container ends here --}}



    <script src="{{ asset('backend/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<!--  BEGIN CUSTOM SCRIPTS FILE  -->
<script src="{{ asset('backend/assets/js/scrollspyNav.js') }}"></script>
<script src="{{ asset('backend/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('backend/plugins/select2/custom-select2.js') }}"></script>
<!--  BEGIN CUSTOM SCRIPTS FILE  -->



<script>
            $(".tagging").select2({
        tags: true
        });
</script>
{{-- category & subcategory change on select --}}
<script type="text/javascript">

    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="subsubcategory_id"]').html('');
                        var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });



        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }


        });

    });
    
</script>


{{-- images onclick change --}}
<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>

    {{-- Multiimages  --}}
<script>
 
    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data
             
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element 
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
             
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });
     
</script>

{{-- Prevent Multiple Click to insert product --}}

<script>

    $('#appointment_form').on('submit', function () {
   $('#register').attr('disabled', 'true'); 
});
</script>




@endsection

