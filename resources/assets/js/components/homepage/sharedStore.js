export const searchFreelancersPredictions = [
    "JavaScript",
    "HTML/CSS",
    "Python",
    "SQL",
    "Java",
    "Node.js",
    "TypeScript",
    "C#",
    "Bash/Shell",
    "C++",
    "PHP",
    "C",
    "PowerShell",
    "Go",
    "Kotlin",
    "Rust",
    "Ruby",
    "Dart",
    "Assembly", "Swift",
    "R",
    "VBA",
    "Matlab",
    "Groovy",
    "Objective-C",
    "Scala",
    "Perl",
    "Haskell",
    "Delphi",
    "Clojure",
    "Elixir",
    "LISP",
    "Julia",
    "F#",
    "Erlang",
    "APL",
    "Crystal",
    "COBOL",

    // databases
    "MySQL",
    "PostgreSQL",
    "SQLite",
    "MongoDB",
    "Microsoft SQL Server",
    "Redis",
    "MariaDB",
    "Firebase",
    "Elasticsearch",
    "Oracle",
    "DynamoDB",
    "Cassandra",
    "IBM DB2",
    "Couchbase",

    // cloud platforms:
    "AWS",
    "Google Cloud Platform",
    "Microsoft Azure",
    "Heroku",
    "DigitalOcean",
    "IBM Cloud or Watson",
    "Oracle Cloud Infrastructure",


    // Web frameworks
    "React.js",
    "jQuery",
    "Express",
    "Angular",
    "Vue.js",
    "ASP.NET Core",
    "Flask",
    "ASP.NET",
    "Django",
    "Spring",
    "Angular.js",
    "Laravel",
    "Ruby on Rails",
    "Gatsby",
    "FastAPI",
    "Symfony",
    "Svelte",
    "Drupal",

    //Other frameworks and libraries
    ".NET Framework",
    "NumPy",
    ".NET Core / .NET 5",
    "Pandas",
    "TensorFlow",
    "React Native",
    "Flutter",
    "Keras",
    "Qt",
    "Torch/PyTorch",
    "Cordova",
    "Apache Spark",
    "Hadoop",

    // tools:


    "Git",
    "Docker",
    "Yarn",
    "Kubernetes",
    "Unity 3D",
    "Ansible",
    "Terraform",
    "Xamarin",
    "Unreal Engine",
    "Puppet",
    "Deno",
    "Chef",
    "Flow",
    "Pulumi",

    // programming tools:

    "Visual Studio Code",
    "Visual Studio",
    "Notepad++",
    "IntelliJ",
    "Vim",
    "Android Studio",
    "Sublime Text",
    "PyCharm",
    "Eclipse",
    "Atom",
    "IPython/Jupyter",
    "Xcode",
    "Webstorm",
    "PHPStorm",
    "NetBeans",
    "Emacs",
    "Neovim",
    "Rider",
    "RStudio",
    "RubyMine",
    "TextMate",

    // operation systems:
    "Windows",
    "Linux-based",
    "MacOS",
    "Windows Subsystem for Linux (WSL)",
    "BSD",

];

export const homepageWrittenQuotes = [
    "The Top 1% of Freelancer's",
    "Hire the top 1% of Freelance Designer's",
    "Search Freelancer's for Hire",
    'On Demand Freelance Talent',
    'Affordable UI Designer',
    'Reliable UX Designer',
    'Talented Graphic Designer',
    'Creative Illustrator',
    'Visionary Motion Designer',
    'Trusted Animator',
    'Verified Product Designer',
    'Approved UX Architect',
];

const sharedStore = {
    state: {
        q: '',
        qPrefix: [],
        enabledFilters: ['pen'],
        workForceProfiles: [],
        projectPreview: {
            isOpen: false,
            profileIndex: 0,
            projectIndex: 0,
        },
        videoPreview: {
            isOpen: false,
            profileIndex: 0,
            videoIndex: 0,
        }
    },
    getters: {},
    mutations: {
        setWorkforceProfiles(workForceProfiles, append = false) {
            workForceProfiles.forEach((profile) => {
                profile.skillTitles = profile.skills.map(function (skill) {
                    return skill.title.toLowerCase();
                });

                profile.percentageSum = 0;
                profile.skills.forEach((skill) => {
                    profile.percentageSum += parseInt(skill.percentage);
                });
            });


            if (append) {
                sharedStore.state.workForceProfiles = sharedStore.state.workForceProfiles.concat(workForceProfiles)
                return;
            }

            sharedStore.state.workForceProfiles = workForceProfiles;
        }
    },
    methods: {
        isFilterEnabled(filter) {
            return sharedStore.state.enabledFilters.includes(filter);
        },
    }
};
export default sharedStore;
