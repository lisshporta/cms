<form wire:submit.prevent="submit">
    {{ $this->form }}

    <div class="py-6">
        <Button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Update
        </Button>
    </div>

</form>
