using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Threading;
using System.Net;

namespace TGBotCaller
{
    class Program
    {
        public static void Main()
        {

            Timer t = new Timer(TimerCallback, null, 0, 3600000);
            Console.WriteLine("Press enter to terminate loop.");
            Console.ReadLine();
        }

        private static void TimerCallback(Object o)
        {
            WebRequest wr = WebRequest.Create("http://localhost");
            wr.Timeout = 3500;

            try
            {
                HttpWebResponse response = (HttpWebResponse)wr.GetResponse();
                Console.WriteLine("TimerCallback: " + DateTime.Now);
            }
            catch (Exception ex)
            {
              
            }            
        }
    }
}
