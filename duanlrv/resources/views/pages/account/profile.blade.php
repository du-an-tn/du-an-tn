@extends('welcome')
@section('content')

<div class="wrapper row3">
    <main class="hoc container clear">
        <section>
            <form action="{{URL::to('/update-profile')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$cus->name}}">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="{{$cus->email}}">
                </div>
                <div class="form-group">
                    <label for="">SDT</label>
                    <input type="number" class="form-control" name="phone" value="{{$cus->phone}}">
                </div>
                
                <div class="form-group">
                    <label for="">Dia Chi</label>
                    <input type="text" class="form-control" name="address" value="{{$cus->address}}">
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="upload" value="">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" >
                    
                </div>
            
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password">
                
                </div>
                <button type="submit" class="btn btn-primary">Luu thong tin</button>
            </form>
        </section>
    </main>
</div>
@endsection