<div class="form-group">                
    {!! Form::label('name', 'Nombre') !!}                
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'nombre del post']) !!} 

    @error('name')
       <span class="text-danger">{{$message}}</span> 
    @enderror              
</div>

<div class="form-group">                
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
        <img id="picture" src="{{asset('img/suiza.jpg')}}" alt="">
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
            </p>  --}}
            
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
</div>