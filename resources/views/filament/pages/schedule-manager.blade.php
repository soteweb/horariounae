<x-filament-panels::page>
<style>
    /* Override Filament page padding */
    .fi-page-content { padding: 0 !important; }
    .sm\:fi-page-content { padding: 0 !important; }

    /* Card box */
    .sched-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 1px 6px 0 rgba(0,0,0,0.07);
        border: 1px solid #e9eaec;
        padding: 32px 32px 28px;
        margin-bottom: 24px;
    }
    .dark .sched-card { background: #18181b; border-color: #27272a; }

    .sched-card h1 {
        font-size: 28px;
        font-weight: 800;
        color: #111827;
        margin: 0 0 20px;
        line-height: 1.1;
    }
    .dark .sched-card h1 { color: #f4f4f5; }

    .sched-filters-row {
        display: flex;
        align-items: flex-end;
        gap: 16px;
        flex-wrap: wrap;
    }

    /* Select wrapper */
    .sched-filter-group {
        display: flex;
        flex-direction: column;
        gap: 4px;
        min-width: 200px;
    }
    .sched-filter-group label {
        font-size: 11px;
        font-weight: 600;
        color: #6b7280;
        text-transform: none;
        letter-spacing: 0;
    }
    .dark .sched-filter-group label { color: #9ca3af; }
    .sched-filter-group select {
        border: 1.5px solid #d1d5db;
        border-radius: 8px;
        padding: 9px 36px 9px 14px;
        font-size: 14px;
        color: #111827;
        background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%236b7280'%3E%3Cpath fill-rule='evenodd' d='M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z' clip-rule='evenodd' /%3E%3C/svg%3E") no-repeat right 10px center/18px;
        -webkit-appearance: none;
        appearance: none;
        cursor: pointer;
        outline: none;
        transition: border-color .15s;
        width: 100%;
    }
    .dark .sched-filter-group select { background-color: #27272a; border-color: #3f3f46; color: #f4f4f5; }
    .sched-filter-group select:focus { border-color: #f59e0b; }

    /* Add button */
    .sched-add-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #f5b82e;
        color: #111827;
        font-weight: 700;
        font-size: 14px;
        border: none;
        border-radius: 12px;
        padding: 11px 22px;
        cursor: pointer;
        transition: background .15s, transform .1s;
        white-space: nowrap;
        box-shadow: 0 2px 8px rgba(245,184,46,0.25);
    }
    .sched-add-btn:hover { background: #e3a91f; transform: translateY(-1px); }
    .sched-add-btn svg { width: 18px; height: 18px; }

    /* Calendar table */
    .sched-table-wrap {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 1px 6px 0 rgba(0,0,0,0.06);
        border: 1px solid #e9eaec;
        overflow: hidden;
    }
    .dark .sched-table-wrap { background: #18181b; border-color: #27272a; }
    .sched-table-scroll { overflow-x: auto; }

    .sched-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }
    .sched-table thead tr {
        background: #f3f4f6;
        border-bottom: 2px solid #e5e7eb;
    }
    .dark .sched-table thead tr { background: #27272a; border-bottom-color: #3f3f46; }

    .sched-table thead th {
        padding: 12px 8px;
        text-align: center;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #9ca3af;
        border-right: 1px solid #e5e7eb;
    }
    .dark .sched-table thead th { color: #6b7280; border-right-color: #3f3f46; }

    .sched-table thead th.col-lunes { color: #f59e0b; }
    .sched-table thead th.col-viernes { color: #f59e0b; }
    .sched-table thead th.col-miercoles { color: #6366f1; }

    .sched-table tbody tr { border-bottom: 1px solid #f3f4f6; }
    .dark .sched-table tbody tr { border-bottom-color: #27272a; }

    .sched-table td {
        padding: 8px;
        border-right: 1px solid #f3f4f6;
        vertical-align: top;
    }
    .dark .sched-table td { border-right-color: #27272a; }

    .sched-table td.time-col {
        text-align: center;
        font-weight: 700;
        font-size: 11px;
        color: #6b7280;
        vertical-align: middle;
        min-width: 64px;
        padding: 8px 6px;
        line-height: 1.4;
    }

    /* Class card */
    .class-card {
        border-radius: 10px;
        padding: 8px 10px;
        margin-bottom: 4px;
        border-width: 1.5px;
        border-style: solid;
    }
    .class-card:last-child { margin-bottom: 0; }
    .class-card.yellow { background: #fffbeb; border-color: #fcd34d; }
    .class-card.purple { background: #f5f3ff; border-color: #c4b5fd; }
    .class-card.blue   { background: #eff6ff; border-color: #bfdbfe; }
    .dark .class-card.yellow { background: rgba(251,191,36,0.12); border-color: #d97706; }
    .dark .class-card.purple { background: rgba(139,92,246,0.12); border-color: #7c3aed; }
    .dark .class-card.blue   { background: rgba(59,130,246,0.12); border-color: #1d4ed8; }

    .class-card .card-title {
        font-weight: 700;
        font-size: 12px;
        color: #1f2937;
        margin-bottom: 4px;
        line-height: 1.3;
    }
    .dark .class-card .card-title { color: #f3f4f6; }
    .class-card.purple .card-title { color: #5b21b6; }
    .dark .class-card.purple .card-title { color: #c4b5fd; }

    .card-row {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 11px;
        color: #4b5563;
        margin-top: 2px;
    }
    .dark .card-row { color: #9ca3af; }
    .card-row svg { width: 12px; height: 12px; opacity: 0.7; flex-shrink: 0; }
    .card-aula {
        font-size: 11px;
        font-weight: 700;
        color: #1e3a8a;
        margin-top: 4px;
    }
    .dark .card-aula { color: #93c5fd; }
    .class-card.purple .card-aula { color: #5b21b6; }
    .dark .class-card.purple .card-aula { color: #c4b5fd; }

    /* Cell hover add button */
    .cell-wrap { position: relative; min-height: 80px; }

    /* Card edit/delete buttons */
    .card-actions {
        display: none;
        position: absolute;
        top: 6px;
        right: 6px;
        gap: 4px;
        z-index: 30;
    }
    .class-card:hover .card-actions { display: flex; }
    .card-action-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 24px;
        height: 24px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        transition: background .12s, transform .1s;
    }
    .card-action-btn svg { width: 13px; height: 13px; }
    .edit-btn { background: rgba(99,102,241,0.12); color: #4338ca; }
    .edit-btn:hover { background: #6366f1; color: #fff; transform: scale(1.1); }
    .delete-btn { background: rgba(239,68,68,0.10); color: #dc2626; }
    .delete-btn:hover { background: #ef4444; color: #fff; transform: scale(1.1); }

    .cell-hover-btn {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        background: rgba(249,250,251,0.85);
        transition: opacity .15s;
        cursor: pointer;
        border: none;
        border-radius: 6px;
        z-index: 10;
        width: 100%;
    }
    .dark .cell-hover-btn { background: rgba(39,39,42,0.85); }
    .sched-table td:hover .cell-hover-btn { opacity: 1; }
    .cell-hover-btn svg { width: 28px; height: 28px; color: #f59e0b; }

    /* Receso row */
    .receso-row td {
        background: #f9fafb;
        border-bottom: 1px solid #f3f4f6;
        padding: 10px 8px;
    }
    .dark .receso-row td { background: #27272a; border-bottom-color: #3f3f46; }
    .receso-label {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #d97706;
        opacity: 0.7;
    }
    .receso-label svg { width: 14px; height: 14px; }

    /* Empty state */
    .sched-empty {
        padding: 64px 24px;
        text-align: center;
        color: #9ca3af;
    }
    .sched-empty svg { width: 48px; height: 48px; margin: 0 auto 16px; opacity: 0.5; }
    .sched-empty h3 { font-size: 16px; font-weight: 700; color: #374151; margin: 0 0 8px; }
    .dark .sched-empty h3 { color: #d1d5db; }
    .sched-empty p { font-size: 13px; color: #9ca3af; margin: 0; }
</style>

@php
    $days = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    $dayColClass = ['Lunes' => 'col-lunes', 'Martes' => '', 'Miércoles' => 'col-miercoles', 'Jueves' => '', 'Viernes' => 'col-viernes', 'Sábado' => ''];
@endphp

<!-- ===== TOP CARD ===== -->
<div class="sched-card">
    <h1>Gestión de Planificación</h1>

    <div class="sched-filters-row">
        <div class="sched-filter-group" style="min-width:220px">
            <label>Seleccionar Carrera</label>
            <select wire:model.live="data.career_id">
                <option value="">-- Seleccionar Carrera --</option>
                @foreach(\App\Models\Career::orderBy('name')->get() as $career)
                    <option value="{{ $career->id }}">{{ $career->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="sched-filter-group" style="min-width:220px">
            <label>Seleccionar Curso / Semestre</label>
            <select wire:model.live="data.course_id">
                <option value="">-- Seleccionar Curso / Semestre --</option>
                @foreach(\App\Models\Course::orderBy('name')->get() as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-left:auto; padding-bottom:1px;">
            <button type="button" class="sched-add-btn" wire:click="mountAction('createSchedule')">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                Añadir Clase / Horario
            </button>
        </div>
    </div>
</div>

<!-- ===== CALENDAR GRID ===== -->
@if(empty($this->data['career_id']) || empty($this->data['course_id']))
    <div class="sched-table-wrap">
        <div class="sched-empty">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <h3>Seleccione una Carrera y Curso</h3>
            <p>Elija los filtros superiores para ver y gestionar la planificación.</p>
        </div>
    </div>
@else
    @php
        $schedules = $this->getSchedules();

        // Bloques dinámicos por carrera (con receso fijo después del slot que termina a las 19:50)
        $careerSlots = $this->getCareerSlots(); // e.g. ['18:20:00 - 19:05:00', ...]
        $allSlots = collect();
        foreach ($careerSlots as $slot) {
            $allSlots->push($slot);
            // Insertar receso fijo justo después del slot que termina a las 19:50
            [, $slotEnd] = explode(' - ', $slot);
            if (\Carbon\Carbon::parse($slotEnd)->format('H:i') === '19:50') {
                $allSlots->push('__RECESO__');
            }
        }

        $subjectColors = [];
        $colorOptions = ['yellow','purple','blue'];
        $colorIdx = 0;
        foreach($schedules as $s) {
            if(!isset($subjectColors[$s->subject_id])) {
                $subjectColors[$s->subject_id] = $colorOptions[$colorIdx % 3];
                $colorIdx++;
            }
        }
    @endphp

    <div class="sched-table-wrap">
        <div class="sched-table-scroll">
            <table class="sched-table">
                <thead>
                    <tr>
                        <th style="width:72px">HORARIO</th>
                        @foreach($days as $day)
                            <th class="{{ $dayColClass[$day] ?? '' }}">{{ strtoupper($day) }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($allSlots as $slot)
                        @if($slot === '__RECESO__')
                            {{-- Fila permanente de receso 19:50–20:00 --}}
                            <tr class="receso-row">
                                <td class="time-col" style="opacity:.6; font-style:italic;">19:50-<br>20:00</td>
                                <td colspan="{{ count($days) }}">
                                    <div class="receso-label">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                        </svg>
                                        RECESO DE ESTUDIANTES
                                    </div>
                                </td>
                            </tr>
                        @else
                            @php
                                [$start, $end] = explode(' - ', $slot);
                                $fmt_s = \Carbon\Carbon::parse($start)->format('H:i');
                                $fmt_e = \Carbon\Carbon::parse($end)->format('H:i');
                            @endphp
                            <tr>
                                <td class="time-col">{{ $fmt_s }}-<br>{{ $fmt_e }}</td>
                                @foreach($days as $day)
                                    <td>
                                        <div class="cell-wrap">
                                            @php
                                                $cells = $schedules->filter(fn($s) =>
                                                    strtolower($s->day_of_week) === strtolower($day) && $s->start_time === $start
                                                );
                                            @endphp
                                            @foreach($cells as $cs)
                                                @php $cardColor = $subjectColors[$cs->subject_id] ?? 'yellow'; @endphp
                                                <div class="class-card {{ $cardColor }}" style="position:relative;">
                                                    <div class="card-title">{{ $cs->subject?->name ?? 'Materia' }}</div>
                                                    <div class="card-row">
                                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                        </svg>
                                                        {{ $cs->teacher?->name ?? 'Docente' }}
                                                    </div>
                                                    <div class="card-aula">Aula: {{ $cs->classroom?->name ?? 'N/A' }}</div>

                                                    <div class="card-actions">
                                                        <button type="button" title="Editar"
                                                            wire:click="mountAction('editSchedule', { id: {{ $cs->id }} })"
                                                            class="card-action-btn edit-btn">
                                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zM16.862 4.487L19.5 7.125"/>
                                                            </svg>
                                                        </button>
                                                        <button type="button" title="Eliminar"
                                                            wire:click="mountAction('deleteSchedule', { id: {{ $cs->id }} })"
                                                            class="card-action-btn delete-btn">
                                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <button type="button" class="cell-hover-btn"
                                                wire:click="mountAction('createSchedule', { day: '{{ $day }}', start: '{{ $start }}', end: '{{ $end }}' })">
                                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- ===== TABLA DE TODOS LOS REGISTROS ===== --}}
    <div style="margin-top: 28px;">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px;">
            <h3 style="font-size:16px; font-weight:700; color:#374151; margin:0;">
                📋 Todos los registros guardados
            </h3>
            <span style="font-size:12px; color:#9ca3af;">
                Edita o elimina cualquier clase desde aquí, incluyendo las que tienen horario incorrecto.
            </span>
        </div>

        <div class="sched-table-wrap">
            @if($schedules->isEmpty())
                <div style="padding:32px; text-align:center; color:#9ca3af; font-size:13px;">
                    No hay clases registradas para este curso todavía.
                </div>
            @else
                <div class="sched-table-scroll">
                    <table class="sched-table" style="font-size:13px;">
                        <thead>
                            <tr>
                                <th style="text-align:left; padding-left:16px;">Materia</th>
                                <th>Docente</th>
                                <th>Aula</th>
                                <th>Día</th>
                                <th>Inicio</th>
                                <th>Fin</th>
                                <th style="width:100px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedules->sortBy(['day_of_week','start_time']) as $cs)
                                <tr>
                                    <td style="padding:10px 16px; font-weight:600; color:#1f2937;">
                                        {{ $cs->subject?->name ?? '—' }}
                                    </td>
                                    <td style="padding:10px 8px; color:#4b5563;">
                                        {{ $cs->teacher?->name ?? '—' }}
                                    </td>
                                    <td style="padding:10px 8px; color:#4b5563;">
                                        {{ $cs->classroom?->name ?? '—' }}
                                    </td>
                                    <td style="padding:10px 8px; font-weight:600; color:#6366f1;">
                                        {{ $cs->day_of_week }}
                                    </td>
                                    <td style="padding:10px 8px; font-family:monospace; color:#374151;">
                                        {{ \Carbon\Carbon::parse($cs->start_time)->format('H:i') }}
                                    </td>
                                    <td style="padding:10px 8px; font-family:monospace; color:#374151;">
                                        {{ \Carbon\Carbon::parse($cs->end_time)->format('H:i') }}
                                    </td>
                                    <td style="padding:10px 8px;">
                                        <div style="display:flex; gap:6px; justify-content:center;">
                                            <button type="button" title="Editar"
                                                wire:click="mountAction('editSchedule', { id: {{ $cs->id }} })"
                                                style="display:inline-flex;align-items:center;gap:4px;padding:5px 10px;background:#eff6ff;border:1px solid #bfdbfe;color:#1d4ed8;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer;transition:background .12s;">
                                                <svg style="width:12px;height:12px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/>
                                                </svg>
                                                Editar
                                            </button>
                                            <button type="button" title="Eliminar"
                                                wire:click="mountAction('deleteSchedule', { id: {{ $cs->id }} })"
                                                style="display:inline-flex;align-items:center;gap:4px;padding:5px 10px;background:#fef2f2;border:1px solid #fecaca;color:#dc2626;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer;transition:background .12s;">
                                                <svg style="width:12px;height:12px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                                </svg>
                                                Eliminar
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endif

<x-filament-actions::modals />
</x-filament-panels::page>
