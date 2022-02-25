<div>
    <div class="d-flex justify-content-center pb-2 px-4">
        <h4 class="py-1">Add steps for task</h4>
        <span wire:click="increment"  role="button" class="fas fa-plus fa-2x px-2 text-primary"></span>
    </div>

    @foreach($steps as $step)
        <div class="flex py-2" wire:key="{{ $loop->index}}">
            <input type="text" value="{{$step['name']}}" name="stepName[]" class="py-2 border" placeholder="{{'Describe Step ' .($loop->index+1)}}">

            <input type="hidden" value="{{$step['id']}}" name="stepId">
            <span role="button" class="fas fa-times text-danger" wire:click="remove({{$loop->index}})"></span>
        </div>
    @endforeach
</div>
