<x-guest-layout>
    <!-- Top accent bar -->
    <div class="-mx-6 -mt-8 mb-7 h-1 bg-indigo-600 rounded-t-2xl"></div>

    <!-- Header -->
    <div class="mb-6 text-center">
        <div class="inline-flex items-center justify-center w-11 h-11 bg-indigo-50 rounded-2xl mb-3">
            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
        </div>
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Create your account</h1>
        <p class="text-sm text-gray-500">Join thousands building connections in their new home.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Full Name</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus autocomplete="name" placeholder="John Doe"
                    class="w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent focus:bg-white transition duration-150" />
            </div>
            @error('name')
                <p class="mt-1.5 text-xs text-gray-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Email Address</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="username" placeholder="you@example.com"
                    class="w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent focus:bg-white transition duration-150" />
            </div>
            @error('email')
                <p class="mt-1.5 text-xs text-gray-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Location -->
        <div>
            <label for="location" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Country / Location</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <select id="location" name="location"
                    class="w-full appearance-none pl-10 pr-10 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent focus:bg-white transition duration-150">
                    <option value="">Select your country</option>
                    <option value="Afghanistan" {{ old('location') == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
                    <option value="Albania" {{ old('location') == 'Albania' ? 'selected' : '' }}>Albania</option>
                    <option value="Algeria" {{ old('location') == 'Algeria' ? 'selected' : '' }}>Algeria</option>
                    <option value="Andorra" {{ old('location') == 'Andorra' ? 'selected' : '' }}>Andorra</option>
                    <option value="Angola" {{ old('location') == 'Angola' ? 'selected' : '' }}>Angola</option>
                    <option value="Antigua and Barbuda" {{ old('location') == 'Antigua and Barbuda' ? 'selected' : '' }}>Antigua and Barbuda</option>
                    <option value="Argentina" {{ old('location') == 'Argentina' ? 'selected' : '' }}>Argentina</option>
                    <option value="Armenia" {{ old('location') == 'Armenia' ? 'selected' : '' }}>Armenia</option>
                    <option value="Australia" {{ old('location') == 'Australia' ? 'selected' : '' }}>Australia</option>
                    <option value="Austria" {{ old('location') == 'Austria' ? 'selected' : '' }}>Austria</option>
                    <option value="Azerbaijan" {{ old('location') == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
                    <option value="Bahamas" {{ old('location') == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
                    <option value="Bahrain" {{ old('location') == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
                    <option value="Bangladesh" {{ old('location') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                    <option value="Barbados" {{ old('location') == 'Barbados' ? 'selected' : '' }}>Barbados</option>
                    <option value="Belarus" {{ old('location') == 'Belarus' ? 'selected' : '' }}>Belarus</option>
                    <option value="Belgium" {{ old('location') == 'Belgium' ? 'selected' : '' }}>Belgium</option>
                    <option value="Belize" {{ old('location') == 'Belize' ? 'selected' : '' }}>Belize</option>
                    <option value="Benin" {{ old('location') == 'Benin' ? 'selected' : '' }}>Benin</option>
                    <option value="Bhutan" {{ old('location') == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
                    <option value="Bolivia" {{ old('location') == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
                    <option value="Bosnia and Herzegovina" {{ old('location') == 'Bosnia and Herzegovina' ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                    <option value="Botswana" {{ old('location') == 'Botswana' ? 'selected' : '' }}>Botswana</option>
                    <option value="Brazil" {{ old('location') == 'Brazil' ? 'selected' : '' }}>Brazil</option>
                    <option value="Brunei" {{ old('location') == 'Brunei' ? 'selected' : '' }}>Brunei</option>
                    <option value="Bulgaria" {{ old('location') == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
                    <option value="Burkina Faso" {{ old('location') == 'Burkina Faso' ? 'selected' : '' }}>Burkina Faso</option>
                    <option value="Burundi" {{ old('location') == 'Burundi' ? 'selected' : '' }}>Burundi</option>
                    <option value="Cabo Verde" {{ old('location') == 'Cabo Verde' ? 'selected' : '' }}>Cabo Verde</option>
                    <option value="Cambodia" {{ old('location') == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
                    <option value="Cameroon" {{ old('location') == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
                    <option value="Canada" {{ old('location') == 'Canada' ? 'selected' : '' }}>Canada</option>
                    <option value="Central African Republic" {{ old('location') == 'Central African Republic' ? 'selected' : '' }}>Central African Republic</option>
                    <option value="Chad" {{ old('location') == 'Chad' ? 'selected' : '' }}>Chad</option>
                    <option value="Chile" {{ old('location') == 'Chile' ? 'selected' : '' }}>Chile</option>
                    <option value="China" {{ old('location') == 'China' ? 'selected' : '' }}>China</option>
                    <option value="Colombia" {{ old('location') == 'Colombia' ? 'selected' : '' }}>Colombia</option>
                    <option value="Comoros" {{ old('location') == 'Comoros' ? 'selected' : '' }}>Comoros</option>
                    <option value="Congo" {{ old('location') == 'Congo' ? 'selected' : '' }}>Congo</option>
                    <option value="Costa Rica" {{ old('location') == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
                    <option value="Croatia" {{ old('location') == 'Croatia' ? 'selected' : '' }}>Croatia</option>
                    <option value="Cuba" {{ old('location') == 'Cuba' ? 'selected' : '' }}>Cuba</option>
                    <option value="Cyprus" {{ old('location') == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
                    <option value="Czech Republic" {{ old('location') == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
                    <option value="Democratic Republic of the Congo" {{ old('location') == 'Democratic Republic of the Congo' ? 'selected' : '' }}>Democratic Republic of the Congo</option>
                    <option value="Denmark" {{ old('location') == 'Denmark' ? 'selected' : '' }}>Denmark</option>
                    <option value="Djibouti" {{ old('location') == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
                    <option value="Dominica" {{ old('location') == 'Dominica' ? 'selected' : '' }}>Dominica</option>
                    <option value="Dominican Republic" {{ old('location') == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
                    <option value="East Timor" {{ old('location') == 'East Timor' ? 'selected' : '' }}>East Timor</option>
                    <option value="Ecuador" {{ old('location') == 'Ecuador' ? 'selected' : '' }}>Ecuador</option>
                    <option value="Egypt" {{ old('location') == 'Egypt' ? 'selected' : '' }}>Egypt</option>
                    <option value="El Salvador" {{ old('location') == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
                    <option value="Equatorial Guinea" {{ old('location') == 'Equatorial Guinea' ? 'selected' : '' }}>Equatorial Guinea</option>
                    <option value="Eritrea" {{ old('location') == 'Eritrea' ? 'selected' : '' }}>Eritrea</option>
                    <option value="Estonia" {{ old('location') == 'Estonia' ? 'selected' : '' }}>Estonia</option>
                    <option value="Eswatini" {{ old('location') == 'Eswatini' ? 'selected' : '' }}>Eswatini</option>
                    <option value="Ethiopia" {{ old('location') == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
                    <option value="Fiji" {{ old('location') == 'Fiji' ? 'selected' : '' }}>Fiji</option>
                    <option value="Finland" {{ old('location') == 'Finland' ? 'selected' : '' }}>Finland</option>
                    <option value="France" {{ old('location') == 'France' ? 'selected' : '' }}>France</option>
                    <option value="Gabon" {{ old('location') == 'Gabon' ? 'selected' : '' }}>Gabon</option>
                    <option value="Gambia" {{ old('location') == 'Gambia' ? 'selected' : '' }}>Gambia</option>
                    <option value="Georgia" {{ old('location') == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                    <option value="Germany" {{ old('location') == 'Germany' ? 'selected' : '' }}>Germany</option>
                    <option value="Ghana" {{ old('location') == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                    <option value="Greece" {{ old('location') == 'Greece' ? 'selected' : '' }}>Greece</option>
                    <option value="Grenada" {{ old('location') == 'Grenada' ? 'selected' : '' }}>Grenada</option>
                    <option value="Guatemala" {{ old('location') == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
                    <option value="Guinea" {{ old('location') == 'Guinea' ? 'selected' : '' }}>Guinea</option>
                    <option value="Guinea-Bissau" {{ old('location') == 'Guinea-Bissau' ? 'selected' : '' }}>Guinea-Bissau</option>
                    <option value="Guyana" {{ old('location') == 'Guyana' ? 'selected' : '' }}>Guyana</option>
                    <option value="Haiti" {{ old('location') == 'Haiti' ? 'selected' : '' }}>Haiti</option>
                    <option value="Honduras" {{ old('location') == 'Honduras' ? 'selected' : '' }}>Honduras</option>
                    <option value="Hungary" {{ old('location') == 'Hungary' ? 'selected' : '' }}>Hungary</option>
                    <option value="Iceland" {{ old('location') == 'Iceland' ? 'selected' : '' }}>Iceland</option>
                    <option value="India" {{ old('location') == 'India' ? 'selected' : '' }}>India</option>
                    <option value="Indonesia" {{ old('location') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                    <option value="Iran" {{ old('location') == 'Iran' ? 'selected' : '' }}>Iran</option>
                    <option value="Iraq" {{ old('location') == 'Iraq' ? 'selected' : '' }}>Iraq</option>
                    <option value="Ireland" {{ old('location') == 'Ireland' ? 'selected' : '' }}>Ireland</option>
                    <option value="Israel" {{ old('location') == 'Israel' ? 'selected' : '' }}>Israel</option>
                    <option value="Italy" {{ old('location') == 'Italy' ? 'selected' : '' }}>Italy</option>
                    <option value="Ivory Coast" {{ old('location') == 'Ivory Coast' ? 'selected' : '' }}>Ivory Coast</option>
                    <option value="Jamaica" {{ old('location') == 'Jamaica' ? 'selected' : '' }}>Jamaica</option>
                    <option value="Japan" {{ old('location') == 'Japan' ? 'selected' : '' }}>Japan</option>
                    <option value="Jordan" {{ old('location') == 'Jordan' ? 'selected' : '' }}>Jordan</option>
                    <option value="Kazakhstan" {{ old('location') == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
                    <option value="Kenya" {{ old('location') == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                    <option value="Kiribati" {{ old('location') == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
                    <option value="Kuwait" {{ old('location') == 'Kuwait' ? 'selected' : '' }}>Kuwait</option>
                    <option value="Kyrgyzstan" {{ old('location') == 'Kyrgyzstan' ? 'selected' : '' }}>Kyrgyzstan</option>
                    <option value="Laos" {{ old('location') == 'Laos' ? 'selected' : '' }}>Laos</option>
                    <option value="Latvia" {{ old('location') == 'Latvia' ? 'selected' : '' }}>Latvia</option>
                    <option value="Lebanon" {{ old('location') == 'Lebanon' ? 'selected' : '' }}>Lebanon</option>
                    <option value="Lesotho" {{ old('location') == 'Lesotho' ? 'selected' : '' }}>Lesotho</option>
                    <option value="Liberia" {{ old('location') == 'Liberia' ? 'selected' : '' }}>Liberia</option>
                    <option value="Libya" {{ old('location') == 'Libya' ? 'selected' : '' }}>Libya</option>
                    <option value="Liechtenstein" {{ old('location') == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
                    <option value="Lithuania" {{ old('location') == 'Lithuania' ? 'selected' : '' }}>Lithuania</option>
                    <option value="Luxembourg" {{ old('location') == 'Luxembourg' ? 'selected' : '' }}>Luxembourg</option>
                    <option value="Madagascar" {{ old('location') == 'Madagascar' ? 'selected' : '' }}>Madagascar</option>
                    <option value="Malawi" {{ old('location') == 'Malawi' ? 'selected' : '' }}>Malawi</option>
                    <option value="Malaysia" {{ old('location') == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                    <option value="Maldives" {{ old('location') == 'Maldives' ? 'selected' : '' }}>Maldives</option>
                    <option value="Mali" {{ old('location') == 'Mali' ? 'selected' : '' }}>Mali</option>
                    <option value="Malta" {{ old('location') == 'Malta' ? 'selected' : '' }}>Malta</option>
                    <option value="Marshall Islands" {{ old('location') == 'Marshall Islands' ? 'selected' : '' }}>Marshall Islands</option>
                    <option value="Mauritania" {{ old('location') == 'Mauritania' ? 'selected' : '' }}>Mauritania</option>
                    <option value="Mauritius" {{ old('location') == 'Mauritius' ? 'selected' : '' }}>Mauritius</option>
                    <option value="Mexico" {{ old('location') == 'Mexico' ? 'selected' : '' }}>Mexico</option>
                    <option value="Micronesia" {{ old('location') == 'Micronesia' ? 'selected' : '' }}>Micronesia</option>
                    <option value="Moldova" {{ old('location') == 'Moldova' ? 'selected' : '' }}>Moldova</option>
                    <option value="Monaco" {{ old('location') == 'Monaco' ? 'selected' : '' }}>Monaco</option>
                    <option value="Mongolia" {{ old('location') == 'Mongolia' ? 'selected' : '' }}>Mongolia</option>
                    <option value="Montenegro" {{ old('location') == 'Montenegro' ? 'selected' : '' }}>Montenegro</option>
                    <option value="Morocco" {{ old('location') == 'Morocco' ? 'selected' : '' }}>Morocco</option>
                    <option value="Mozambique" {{ old('location') == 'Mozambique' ? 'selected' : '' }}>Mozambique</option>
                    <option value="Myanmar" {{ old('location') == 'Myanmar' ? 'selected' : '' }}>Myanmar</option>
                    <option value="Namibia" {{ old('location') == 'Namibia' ? 'selected' : '' }}>Namibia</option>
                    <option value="Nauru" {{ old('location') == 'Nauru' ? 'selected' : '' }}>Nauru</option>
                    <option value="Nepal" {{ old('location') == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                    <option value="Netherlands" {{ old('location') == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
                    <option value="New Zealand" {{ old('location') == 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
                    <option value="Nicaragua" {{ old('location') == 'Nicaragua' ? 'selected' : '' }}>Nicaragua</option>
                    <option value="Niger" {{ old('location') == 'Niger' ? 'selected' : '' }}>Niger</option>
                    <option value="Nigeria" {{ old('location') == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                    <option value="North Korea" {{ old('location') == 'North Korea' ? 'selected' : '' }}>North Korea</option>
                    <option value="North Macedonia" {{ old('location') == 'North Macedonia' ? 'selected' : '' }}>North Macedonia</option>
                    <option value="Norway" {{ old('location') == 'Norway' ? 'selected' : '' }}>Norway</option>
                    <option value="Oman" {{ old('location') == 'Oman' ? 'selected' : '' }}>Oman</option>
                    <option value="Pakistan" {{ old('location') == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                    <option value="Palau" {{ old('location') == 'Palau' ? 'selected' : '' }}>Palau</option>
                    <option value="Panama" {{ old('location') == 'Panama' ? 'selected' : '' }}>Panama</option>
                    <option value="Papua New Guinea" {{ old('location') == 'Papua New Guinea' ? 'selected' : '' }}>Papua New Guinea</option>
                    <option value="Paraguay" {{ old('location') == 'Paraguay' ? 'selected' : '' }}>Paraguay</option>
                    <option value="Peru" {{ old('location') == 'Peru' ? 'selected' : '' }}>Peru</option>
                    <option value="Philippines" {{ old('location') == 'Philippines' ? 'selected' : '' }}>Philippines</option>
                    <option value="Poland" {{ old('location') == 'Poland' ? 'selected' : '' }}>Poland</option>
                    <option value="Portugal" {{ old('location') == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                    <option value="Qatar" {{ old('location') == 'Qatar' ? 'selected' : '' }}>Qatar</option>
                    <option value="Romania" {{ old('location') == 'Romania' ? 'selected' : '' }}>Romania</option>
                    <option value="Russia" {{ old('location') == 'Russia' ? 'selected' : '' }}>Russia</option>
                    <option value="Rwanda" {{ old('location') == 'Rwanda' ? 'selected' : '' }}>Rwanda</option>
                    <option value="Saint Kitts and Nevis" {{ old('location') == 'Saint Kitts and Nevis' ? 'selected' : '' }}>Saint Kitts and Nevis</option>
                    <option value="Saint Lucia" {{ old('location') == 'Saint Lucia' ? 'selected' : '' }}>Saint Lucia</option>
                    <option value="Saint Vincent and the Grenadines" {{ old('location') == 'Saint Vincent and the Grenadines' ? 'selected' : '' }}>Saint Vincent and the Grenadines</option>
                    <option value="Samoa" {{ old('location') == 'Samoa' ? 'selected' : '' }}>Samoa</option>
                    <option value="San Marino" {{ old('location') == 'San Marino' ? 'selected' : '' }}>San Marino</option>
                    <option value="Sao Tome and Principe" {{ old('location') == 'Sao Tome and Principe' ? 'selected' : '' }}>Sao Tome and Principe</option>
                    <option value="Saudi Arabia" {{ old('location') == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                    <option value="Senegal" {{ old('location') == 'Senegal' ? 'selected' : '' }}>Senegal</option>
                    <option value="Serbia" {{ old('location') == 'Serbia' ? 'selected' : '' }}>Serbia</option>
                    <option value="Seychelles" {{ old('location') == 'Seychelles' ? 'selected' : '' }}>Seychelles</option>
                    <option value="Sierra Leone" {{ old('location') == 'Sierra Leone' ? 'selected' : '' }}>Sierra Leone</option>
                    <option value="Singapore" {{ old('location') == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                    <option value="Slovakia" {{ old('location') == 'Slovakia' ? 'selected' : '' }}>Slovakia</option>
                    <option value="Slovenia" {{ old('location') == 'Slovenia' ? 'selected' : '' }}>Slovenia</option>
                    <option value="Solomon Islands" {{ old('location') == 'Solomon Islands' ? 'selected' : '' }}>Solomon Islands</option>
                    <option value="Somalia" {{ old('location') == 'Somalia' ? 'selected' : '' }}>Somalia</option>
                    <option value="South Africa" {{ old('location') == 'South Africa' ? 'selected' : '' }}>South Africa</option>
                    <option value="South Korea" {{ old('location') == 'South Korea' ? 'selected' : '' }}>South Korea</option>
                    <option value="South Sudan" {{ old('location') == 'South Sudan' ? 'selected' : '' }}>South Sudan</option>
                    <option value="Spain" {{ old('location') == 'Spain' ? 'selected' : '' }}>Spain</option>
                    <option value="Sri Lanka" {{ old('location') == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
                    <option value="Sudan" {{ old('location') == 'Sudan' ? 'selected' : '' }}>Sudan</option>
                    <option value="Suriname" {{ old('location') == 'Suriname' ? 'selected' : '' }}>Suriname</option>
                    <option value="Sweden" {{ old('location') == 'Sweden' ? 'selected' : '' }}>Sweden</option>
                    <option value="Switzerland" {{ old('location') == 'Switzerland' ? 'selected' : '' }}>Switzerland</option>
                    <option value="Syria" {{ old('location') == 'Syria' ? 'selected' : '' }}>Syria</option>
                    <option value="Taiwan" {{ old('location') == 'Taiwan' ? 'selected' : '' }}>Taiwan</option>
                    <option value="Tajikistan" {{ old('location') == 'Tajikistan' ? 'selected' : '' }}>Tajikistan</option>
                    <option value="Tanzania" {{ old('location') == 'Tanzania' ? 'selected' : '' }}>Tanzania</option>
                    <option value="Thailand" {{ old('location') == 'Thailand' ? 'selected' : '' }}>Thailand</option>
                    <option value="Togo" {{ old('location') == 'Togo' ? 'selected' : '' }}>Togo</option>
                    <option value="Tonga" {{ old('location') == 'Tonga' ? 'selected' : '' }}>Tonga</option>
                    <option value="Trinidad and Tobago" {{ old('location') == 'Trinidad and Tobago' ? 'selected' : '' }}>Trinidad and Tobago</option>
                    <option value="Tunisia" {{ old('location') == 'Tunisia' ? 'selected' : '' }}>Tunisia</option>
                    <option value="Turkey" {{ old('location') == 'Turkey' ? 'selected' : '' }}>Turkey</option>
                    <option value="Turkmenistan" {{ old('location') == 'Turkmenistan' ? 'selected' : '' }}>Turkmenistan</option>
                    <option value="Tuvalu" {{ old('location') == 'Tuvalu' ? 'selected' : '' }}>Tuvalu</option>
                    <option value="Uganda" {{ old('location') == 'Uganda' ? 'selected' : '' }}>Uganda</option>
                    <option value="Ukraine" {{ old('location') == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                    <option value="United Arab Emirates" {{ old('location') == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
                    <option value="United Kingdom" {{ old('location') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                    <option value="United States" {{ old('location') == 'United States' ? 'selected' : '' }}>United States</option>
                    <option value="Uruguay" {{ old('location') == 'Uruguay' ? 'selected' : '' }}>Uruguay</option>
                    <option value="Uzbekistan" {{ old('location') == 'Uzbekistan' ? 'selected' : '' }}>Uzbekistan</option>
                    <option value="Vanuatu" {{ old('location') == 'Vanuatu' ? 'selected' : '' }}>Vanuatu</option>
                    <option value="Vatican City" {{ old('location') == 'Vatican City' ? 'selected' : '' }}>Vatican City</option>
                    <option value="Venezuela" {{ old('location') == 'Venezuela' ? 'selected' : '' }}>Venezuela</option>
                    <option value="Vietnam" {{ old('location') == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
                    <option value="Yemen" {{ old('location') == 'Yemen' ? 'selected' : '' }}>Yemen</option>
                    <option value="Zambia" {{ old('location') == 'Zambia' ? 'selected' : '' }}>Zambia</option>
                    <option value="Zimbabwe" {{ old('location') == 'Zimbabwe' ? 'selected' : '' }}>Zimbabwe</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>
            @error('location')
                <p class="mt-1.5 text-xs text-gray-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password row -->
        <div class="grid md:grid-cols-2 gap-3">
            <!-- Password -->
            <div>
                <label for="password" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Password</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <input id="password" type="password" name="password" autocomplete="new-password" placeholder="••••••••"
                        class="w-full pl-10 pr-10 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent focus:bg-white transition duration-150" />
                    <button type="button" onclick="togglePassword('password', this)" tabindex="-1"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-150">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="mt-1.5 text-xs text-gray-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Confirm</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" placeholder="••••••••"
                        class="w-full pl-10 pr-10 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent focus:bg-white transition duration-150" />
                    <button type="button" onclick="togglePassword('password_confirmation', this)" tabindex="-1"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-150">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
                @error('password_confirmation')
                    <p class="mt-1.5 text-xs text-gray-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Submit -->
        <div class="pt-2">
            <button type="submit"
                class="w-full flex justify-center items-center gap-2 px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-xl shadow-sm hover:shadow-md active:scale-95 transition-all duration-150">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
                Create Account
            </button>
        </div>

        <!-- Login link -->
        <div class="text-center pt-3 border-t border-gray-100">
            <p class="text-sm text-gray-500">
                Already have an account?
                <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-700 transition-colors duration-150">
                    Log in
                </a>
            </p>
        </div>
    </form>

    <script>
        function togglePassword(id, btn) {
            const input = document.getElementById(id);
            const show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            btn.querySelector('svg').innerHTML = show
                ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>'
                : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
        }
    </script>
</x-guest-layout>
