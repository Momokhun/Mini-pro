<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="sub-title">
        <h2>サブタスクの追加</h2>
        <span wire:click="increment" class="fas fa-plus"></span>
    </div>

    @foreach($steps as $step)
    <div class="steps" wire:key="{{$loop->index}}">
        <input class="step" type="text" name="stepName[]" placeholder="{{'サブタスク'.($loop->index+1)}}"  @if ( is_array($step) ) value="{{ $step['name'] }}" @endif>
        <input type="hidden" name="stepId[]"  @if ( is_array($step) ) value="{{$step['id']}}" @endif>
        <span wire:click="remove({{$loop->index}})" class="fas fa-times"></span>
    </div>
    @endforeach
</div>
