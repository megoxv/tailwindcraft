@aware(['component'])

@php
    $theme = $component->getTheme();

    $customAttributes = [
        'wrapper' => $this->getTableWrapperAttributes(),
        'table' => $this->getTableAttributes(),
        'thead' => $this->getTheadAttributes(),
        'tbody' => $this->getTbodyAttributes(),
    ];
@endphp

@if ($theme === 'tailwind')
    <div {{
        $attributes->merge($customAttributes['wrapper'])
            ->class(['bg-white border border-gray-200 rounded-xl shadow-sm  dark:bg-gray-900 dark:border-gray-700 inline-block align-middle w-full overflow-x-auto' => $customAttributes['wrapper']['default'] ?? true])
            ->except('default')
    }}>
        <table {{
            $attributes->merge($customAttributes['table'])
                ->class(['overflow-hidden min-w-full divide-y divide-gray-200 dark:divide-gray-700' => $customAttributes['table']['default'] ?? true])
                ->except('default')
        }}>
            <thead {{
                $attributes->merge($customAttributes['thead'])
                    ->class(['bg-gray-50 dark:bg-gray-800' => $customAttributes['thead']['default'] ?? true])
                    ->except('default')
            }}>
                <tr>
                    {{ $thead }}
                </tr>
            </thead>
            <tbody
                @if ($component->reorderIsEnabled())
                    wire:sortable="{{ $component->getReorderMethod() }}"
                @endif

                {{
                    $attributes->merge($customAttributes['tbody'])
                        ->class(['divide-y divide-gray-200 dark:divide-gray-700' => $customAttributes['tbody']['default'] ?? true])
                        ->except('default')
                }}
            >
                {{ $slot }}
            </tbody>

            @if (isset($tfoot))
                <tfoot>
                    {{ $tfoot }}
                </tfoot>
            @endif
        </table>
    </div>
@elseif ($theme === 'bootstrap-4' || $theme === 'bootstrap-5')
    <div {{ 
        $attributes->merge($customAttributes['wrapper'])
            ->class(['table-responsive' => $customAttributes['wrapper']['default'] ?? true])
            ->except('default')
    }}>
        <table {{
            $attributes->merge($customAttributes['table'])
                ->class(['table table-striped' => $customAttributes['table']['default'] ?? true])
                ->except('default')
        }}>
            <thead {{
                $attributes->merge($customAttributes['thead'])
                    ->class(['' => $customAttributes['thead']['default'] ?? true])
                    ->except('default')
            }}>
                <tr>
                    {{ $thead }}
                </tr>
            </thead>

            <tbody
                @if ($component->reorderIsEnabled())
                    wire:sortable="{{ $component->getReorderMethod() }}"
                @endif

                {{
                    $attributes->merge($customAttributes['tbody'])
                        ->class(['' => $customAttributes['tbody']['default'] ?? true])
                        ->except('default')
                }}
            >
                {{ $slot }}
            </tbody>

            @if (isset($tfoot))
                <tfoot>
                    {{ $tfoot }}
                </tfoot>
            @endif
        </table>
    </div>
@endif
