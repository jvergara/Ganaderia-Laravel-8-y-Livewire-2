<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('id', 'ID') !!}
            {!! Form::text('id', null, ['class' => 'form-control', 'readonly' => '']) !!}

            @error('id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}

            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            {!! Form::label('correo', 'Email') !!}
            {!! Form::text('correo', null, ['class' => 'form-control']) !!}

            @error('correo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('monto', 'Monto') !!}
            {!! Form::text('monto', null, ['class' => 'form-control', 'placeholder' => 'nombre del post']) !!}

            @error('monto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">   
            {!! Form::label('estado', 'Estado') !!} 
            <br>
                    {{ Form::radio('estado', '1') }} [1] Pago exitoso&nbsp;&nbsp;&nbsp;
                    {{ Form::radio('estado', '0') }} [0] No finalizado              

            @error('estado')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
<div class="col-md-4">
    <div class="form-group">
        {!! Form::label('fecha', 'Fecha') !!}
        {!! Form::text('fecha', date('d-m-Y H:i', strtotime($transaction->fecha)), ['class' => 'form-control', 'readonly' => '']) !!}

        @error('fecha')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
</div>


{{--  <div class="form-group">                
    {!! Form::label('slug', 'Slug') !!}                
    {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'campo slug', 'readonly'=>'']) !!}
     
    @error('slug')
    <span class="text-danger">{{$message}}</span> 
    @enderror               
</div>

<div class="form-group">                
    {!! Form::label('category_id', 'Categoría') !!}               
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}                
    @error('category_id')
    <span class="text-danger">{{$message}}</span> 
    @enderror               
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper flex h-screen w-full bg-blue-400 justify-center items-center">
        @isset($post->image)
        <img id="picture" src="{{Storage::url($post->image->url)}}" alt="">
        @else
        <img id="picture" src="{{asset('img/circle_file.png')}}" alt="">
        @endif
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            
            {!! Form::label('file', 'Imágen del post') !!}                        
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            @error('file')
            <span class="text-danger">{{$message}}</span> 
            @enderror

{{--              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et voluptate commodi reprehenderit a esse saepe!
                Hic explicabo, repudiandae error sed eligendi alias. Placeat quasi, illum ut asperiores magnam quis 
                doloribus.
            </p>  --}
            
        </div>
    </div>
</div>

<div class="form-group">                
    {!! Form::label('extract', 'Extracto') !!}                
    {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}
    @error('extract')
    <span class="text-danger">{{$message}}</span> 
    @enderror                
</div>

<div class="form-group">                
    {!! Form::label('body', 'Detalle del post') !!}                
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    @error('body')
    <span class="text-danger">{{$message}}</span> 
    @enderror                
</div>

<div class="form-group">                
    <p class="font-weight-bold">Etiquetas</p>
    @foreach ($tags as $tag)
        <label class="mr-2">                        
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{$tag->name}}
        </label>
    @endforeach

    @error('tags')
    <br>
    <span class="text-danger">{{$message}}</span> 
    @enderror  
</div>

<div class="form-group">                
    <p class="font-weight-bold">Estado</p>
        <label class="mr-2">
            {!! Form::radio('status', 1, true) !!}
            Borrador
        </label>
        <label>
            {!! Form::radio('status', 2) !!}
            Publicado                        
        </label>
        <hr>
        @error('status')
        <span class="text-danger">{{$message}}</span> 
        @enderror  
</div>  --}}
