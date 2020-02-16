using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;

namespace TestXamarin.Class
{
    class Visiteur
    {
        public string id { get; set; }
        public string nom { get; set; }
        public string prenom { get; set; }
        public string login { get; set; }
        public string mdp { get; set; }
        public string adresse { get; set; }
    }
}