<div>
    <div class="sub-title">
        <h2>サブタスクの追加</h2>
        <span wire:click="increment" class="fas fa-plus"></span>
    </div>

    @foreach($steps as $step)
    <div class="steps" wire:key="{{$step}}">
        <input class="step" type="text" name="step[]" placeholder="{{'サブタスク'.($step+1)}}">
        <span wire:click="remove({{$step}})" class="fas fa-times"></span>
    </div>
    @endforeach


</div>
