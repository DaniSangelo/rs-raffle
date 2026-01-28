<button
    {{ $attributes->class([

        'text-sm text-white py-1 px-2 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2',
        'bg-blue-600  hover:bg-blue-700 focus:ring-blue-500'

    ])  }}

type="submit">

    {{ $slot }}

