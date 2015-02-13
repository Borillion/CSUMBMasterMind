#include <iostream>
#include <cassert>
// include header file
#include "stats.h"

    Stats::Stats()
        {
        count= 0;
        total=0;
        reset();
        }
    void stats::reset()
    {
    count= 0;
    total = 0;
    }

    /// void append( const double r )
    /// The number r has been given to the Stats object as the next
    /// number to be appended to its sequence of numbers.
    /// @param r A real number.
    void Stats::append( const double r )
        {




        }

    double Stats::mean() const
       {
        double mean;
        assert (count > 0);
        mean = total / count;

        return mean;
       }



    double Stats::sum() const
    {
        return total;
    }

    int Stats::length() const
        {
            return count;
        }

    double Stats::maximum() const
        {
            assert(count>0);
            return largest;
        }

    double Stats::minimum() const
        {
            assert(count>0);
            return smallest;
        }
