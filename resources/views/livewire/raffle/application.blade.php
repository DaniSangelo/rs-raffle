<div>
    @if ($success)
        <div class="flex flex-col items-center justify-center p-4 bg-green-700 border rounded-lg border-green-300">
            <h1 class="text-2xl font-bold">Thank you for your submisstion</h1>
            <p class="mt-2">We will contact you soon.</p>
        </div>
    @else
        <form wire:submit="save">
            <x-ui.input 
                label="Enter your email" 
                name="email" 
                wire:model="email"
            />
            <x-ui.button type="submit" class="mt-4">Submit</x-ui.button>
        </form>
    @endif

    <br>

    <div class="border border-gray-200 dark:border-gray-800 rounded-lg p-4" x-data="{ open: true }">
        <h3 class="text-lg font-medium text-gray-800 dark:text-gray-300 mb-4 cursor-pointer" @click="open = !open"> 
            Participants
            <span class="text-sm text-gray-500 dark:text-gray-400">({{count($this->participants)}})</span>
            <span class="cursor-pointer inline-block ml-2">

                <svg
                    class="w-5 h-5 inline-block text-gray-500 dark:text-gray-400 transition-transform duration-200"
                    :class="open ? 'rotate-180' : ''" 
                    xmlns="http://www.w3.org/2000/svg" 
                    fill="none"
                    viewBox="0 0 24 24" 
                    stroke="currentColor">

                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        stroke-width="2" 
                        d="M19 9l-7 7-7-7" />
                        
                </svg>

            </span>
        </h3>
        <ul class="divide-y divide-gray-100" x-show="open" x-collapse>
            @foreach($this->participants as $participant)
                <li class="py-2 px-2 hover:bg-gray-50 dark:hover:bg-gray-900">{{ $participant }}</li>
            @endforeach
        </ul>
    </div>

    <br>
</div>