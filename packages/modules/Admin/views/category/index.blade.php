@extends('packages::layouts.master')
@section('content') 
@include('packages::partials.main-header')
<!-- Left side column. contains the logo and sidebar -->
@include('packages::partials.main-sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
    @include('packages::partials.breadcrumb')

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
           
                <div class="col-md-12">
                   <div class="portlet light portlet-fit bordered">
                        <div class="portlet-body">
                            <div class="row">
                                <div class="box">
                                    <div class="box-header">
                                        <span style="font-size: 30px;"> Category    </span>
                                        <span>
                                        
                                                 <a href="{{ route('category.create')}}" class="col-md-2 pull-right">
                                                    <button class="btn  btn-primary"><i class="fa fa-user-plus"></i> Add Category</button> 
                                                </a>
                                              </span>
                                        
                                      </div><!-- /.box-header -->
                                       
                                
                                      @if(Session::has('flash_alert_notice'))
                                           <div class="alert alert-success alert-dismissable" >
                                              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                            <i class="icon fa fa-check"></i>  
                                           {{ Session::get('flash_alert_notice') }} 
                                           </div>
                                      @endif 
                                      <div class="box-body table-responsive no-padding" >
                            
                                        
                                      <div class="box-body table-responsive no-padding" >
                                         
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead><tr>
                                                    <th>Sno</th> 
                                                    <th>Category Name</th> 
                                                    <th>Created Date</th> 
                                                    <th>Action</th>
                                                </tr>
                                                @if(count($categories )==0)
                                                    <tr>
                                                      <td colspan="7">
                                                        <div class="alert alert-danger alert-dismissable">
                                                          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                          <i class="icon fa fa-check"></i>  
                                                          {{ 'Record not found. Try again !' }}
                                                        </div>
                                                      </td>
                                                    </tr>
                                                  @endif
                                                   <?php $i=0; ?>
                                                @foreach ($categories  as $key => $result)  
                                                  @if($result->parent_id==0) 
                                             <thead>
                                              <tbody>    
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $result->name }}  
                                                        <a href="{{ route('category.edit',$result->id)}}">
                                                            <i class="fa fa-fw fa-pencil-square-o" title="edit"></i> 
                                                        </a></td> 
                                                    
                                                    <td>
                                                        {!! Carbon\Carbon::parse($result->created_at)->format('m-d-Y H:i:s A'); !!}
                                                    </td>
                                                    
                                                    <td> 

                                                        {!! Form::open(array('class' => 'form-inline pull-left deletion-form', 'method' => 'DELETE',  'id'=>'deleteForm_'.$result->id, 'route' => array('category.destroy', $result->id))) !!}
                                                        <button class='delbtn btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete" id="{{$result->id}}"><i class="fa fa-fw fa-trash" title="Delete"></i></button>
                                                        
                                                         {!! Form::close() !!}

                                                    </td>
                                                </tr>
                                                </tbody>
                                                <thead>
                                                @endif
                                                @endforeach 
                                            </table>
                                      </div>   
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>       
        </div> 
        <!-- Main row --> 
    </section><!-- /.content -->
</div> 

@stop
