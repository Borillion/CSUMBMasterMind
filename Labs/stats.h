#ifndef STATS_H_
#define STATS_H_


/// The Stats Class.
/// @brief Keeps track of statistics on a sequence of real numbers.
/// @note Assignments and the copy constructor may be used
/// with Stats objects.
class Stats
{
private:
    int    count;     ///< The count of numbers in the sequence.
    double total;     ///< The sum of all the numbers in the sequence.
    double smallest;  ///< The smallest number in the sequence.
    double largest;   ///< The largest number in the sequence.

public:
    /// CONSTRUCTOR
    /// Postcondition: The object has been initialized and is ready to
    /// accept a sequence of numbers. Various statistics will be
    /// calculated about the sequence.
    /// @see reset()
    Stats() { reset(); }

    /// void reset();
    /// Postcondition: The Stats object has been cleared as if no
    /// numbers had yet been given to it.
    void reset() { total = count = 0; }

    /// void append( const double r )
    /// The number r has been given to the Stats object as the next
    /// number to be appended to its sequence of numbers.
    /// @param r A real number.
    void append( const double r );

    /// int length() const
    /// Postcondition: The return value is the length of the sequence
    /// that has been given to the Stats (i.e., the number of times that
    /// the append(r) function has been activated).
    /// @return The count of values appended to this object.
    int length() const { return count; }

    /// double sum() const
    /// Postcondition: The return value is the sum of all the numbers in
    /// the Stats's sequence.
    /// @return Sum of all real values appended to this object.
    double sum() const { return total; }

    /// double mean() const
    /// Precondition: length() > 0
    /// Postcondition: The return value is the arithmetic mean (i.e.,
    /// the average of all the numbers in the Stats's sequence).
    /// @note asserts length() > 0
    /// @return The average of all real values appended to this object.
    double mean() const;

    /// double minimum() const
    /// Precondition: length() > 0
    /// Postcondition: The return value is the tiniest number in the
    /// Stats's sequence.
    /// @note asserts length() > 0
    /// @return The minimum value appended to this object.
    double minimum() const;

    /// double maximum() const
    /// Precondition: length() > 0
    /// Postcondition: The return value is the largest number in the
    /// Stats's sequence.
    /// @note asserts length() > 0
    /// @return The maximum value appended to this object.
    double maximum() const;
};


#endif /* defined(STATS_H_) */
