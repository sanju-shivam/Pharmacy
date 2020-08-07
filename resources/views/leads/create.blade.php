
<div id="main">
    <div class="row">
        <div class="col-md-12 m-auto">
        
            <hr>
            <form role="form" method="POST" action="{{route('admin.leads.store')}}">

                @csrf

                
            <div class="form-group">
                <select name="requirement" class="form-control @error('requirement') is-invalid @enderror">
                    <option value="none">Select</option>
                    <option value="3rd Party Manufacturing">3rd Party Manufacturing</option>
                    <option value="PCD Frenchise">PCD Frenchise</option>
                </select>

                @error('requirement')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autocomplete="off" placeholder="Name" required>
                
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            </div>

            <div class="form-group">
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" autocomplete="off" placeholder="Phone" required>
            
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" placeholder="Email">
            
                 @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            </div>

            <button type="submit" class="btn btn-outline-primary w-100">Submit</button>

            </form>
            <div class="my-3">
            </div>
            
        </div>

    </div>
</div>
     

