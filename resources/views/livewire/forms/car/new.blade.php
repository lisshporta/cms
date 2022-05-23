<form wire:submit.prevent="submit">
    {{ $this->form }}

    <div class="py-6">
        <Button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-volt-primary hover:bg-volt-primary-700 focus:outline-none">
            Save
        </Button>
    </div>

</form>
